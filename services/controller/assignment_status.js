const grpc = require('@grpc/grpc-js');
const protoLoader = require('@grpc/proto-loader');

const packageDefinition = protoLoader.loadSync('proto/assignment_status.proto', {
    keepCase: true,
    longs: String,
    enums: String,
    arrays: true,
});

const AssignmentStatusService = grpc.loadPackageDefinition(packageDefinition).AssignmentStatusService;
const client = new AssignmentStatusService('127.0.0.1:3003', grpc.credentials.createInsecure());

module.exports = client;
