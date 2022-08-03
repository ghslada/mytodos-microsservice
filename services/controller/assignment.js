const grpc = require('@grpc/grpc-js');
const protoLoader = require('@grpc/proto-loader');

const packageDefinition = protoLoader.loadSync('proto/assignment.proto', {
    keepCase: true,
    longs: String,
    enums: String,
    arrays: true,
});

const AssignmentService = grpc.loadPackageDefinition(packageDefinition).AssignmentService;
const client = new AssignmentService('127.0.0.1:3004', grpc.credentials.createInsecure());

module.exports = client;
