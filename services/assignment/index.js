const grpc = require('@grpc/grpc-js');
const protoLoader = require('@grpc/proto-loader');
// const users = require('./users.json');
const { connection } = require('../connection.js');

const packageDefinition = protoLoader.loadSync('proto/assignment.proto', {
    keepCase: true,
    longs: String,
    enums: String,
    arrays: true,
});

const assignmentProto = grpc.loadPackageDefinition(packageDefinition);

const server = new grpc.Server();

Functions = {

    QueryBy: async (sql, parameters) => {
        return new Promise( (resolve, reject) => {
            console.log(sql);
            connection.query({
                sql: sql,
                timeout: 40000, // 40s
                values: parameters
            }, function (error, results, fields) {
                // error will be an Error if one occurred during the query
                // results will contain the results of the query
                // fields will contain information about the returned results fields (if any)
                if (!error) {
                    // console.log(JSON.parse(JSON.stringify(results)));
                    resolve(JSON.parse(JSON.stringify(results)));

                } else {
                    console.log("Error " + error);
                    reject(error);
                }
            });
        });
    },
}

// implementa os métodos do ShippingService
server.addService(assignmentProto.AssignmentService.service, {

    GetAssignments: async (payload, callback) => {
        const sql = "SELECT id, title, description, owner_id, assigned_to_id, assignment_status_id, assignment_types_id, creation_date, updated_at FROM assignment WHERE owner_id=? OR assigned_to_id=?";
        const parameters = [payload.request.user_id, payload.request.user_id];
        // Functions.QueryBy(sql, parameters, next => {
        //     if (!next[0]) {
        //         callback(null,
        //             {}
        //         );
        //     } else {
        //         callback(null,
        //             { response: next }
        //         );
        //     }

        // });
        await Functions.QueryBy(sql, parameters)
        .then( next => {
            console.log(next);
            callback(null,
                { assignmentSet: next }
            );
        })
        .catch(
            err => {
                callback(null,
                    {}
                );
            }
        );
        // if (!next[0]) {
            
        // } else {
            
        // }
    },
    NewAssignmentSet: async (payload, callback) => {
        const sql = "INSERT INTO assignment(title, description, owner_id, assigned_to_id, assignment_status_id, assignment_types_id) VALUES (?)";
        const objectsList = payload.request.newAssignmentSet;

        console.log('Request data: ' + JSON.stringify(objectsList));

        const parameters = await objectsList.map(obj => {
            const objectValues = [];
            count = 0;
            Object.keys(obj).forEach(key => {
                console.log(obj[key]);
                objectValues[count] = obj[key];
                count++;
            })
            return objectValues;
        });

        console.log(parameters);

        await Functions.QueryBy(sql, parameters)
        .then( next => {
            const response = [next];
            console.log(response);
            callback(null,
                { newAssignmentSetResponse: response }
            );
        })
        .catch(
            err => {
                callback(null,
                    {}
                );
            }
        );

    }

});

server.bindAsync('0.0.0.0:3004', grpc.ServerCredentials.createInsecure(), () => {
    console.log('Assignments Service running at http://127.0.0.1:3004');
    server.start();
});

