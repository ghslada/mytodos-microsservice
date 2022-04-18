const grpc = require('@grpc/grpc-js');
const protoLoader = require('@grpc/proto-loader');
// const users = require('./users.json');
const {connection} = require('../connection.js');

const packageDefinition = protoLoader.loadSync('proto/assignment_status.proto', {
    keepCase: true,
    longs: String,
    enums: String,
    arrays: true,
});

const assignmentStatusProto = grpc.loadPackageDefinition(packageDefinition);

const server = new grpc.Server();

Functions = {
    
    QueryBy : (sql, parameters, next) => {
        connection.query({
            sql: sql,
            timeout: 40000, // 40s
            values: parameters
          }, function (error, results, fields) {
                // error will be an Error if one occurred during the query
                // results will contain the results of the query
                // fields will contain information about the returned results fields (if any)
                if (!error) {
                    console.log(JSON.parse(JSON.stringify(results)));
                    next(JSON.parse(JSON.stringify(results)));
                    
                } else {
                    console.log("Error "+error);
                }
          });
    },
}

// implementa os métodos do ShippingService
server.addService(assignmentStatusProto.AssignmentStatusService.service, {

    GetAssignmentStatus: (_, callback) => {
        const sql = "SELECT * FROM assignment_status";
        // const parameters = {};
        // const users = query(sql);
        Functions.QueryBy(sql, {}, next => {

                callback(null,
                    { assignmentStatusSet:  next });
            
        });
    }
    
});

server.bindAsync('0.0.0.0:3003', grpc.ServerCredentials.createInsecure(), () => {
    console.log('Assignment Status Service running at http://127.0.0.1:3003');
    server.start();
});

