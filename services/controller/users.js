const grpc = require('@grpc/grpc-js');
const protoLoader = require('@grpc/proto-loader');

const packageDefinition = protoLoader.loadSync('proto/users.proto', {
    keepCase: true,
    longs: String,
    enums: String,
    arrays: true,
});

const UsersService = grpc.loadPackageDefinition(packageDefinition).UsersService;
const client = new UsersService('127.0.0.1:3001', grpc.credentials.createInsecure());

module.exports = client;
