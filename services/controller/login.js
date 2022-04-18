const grpc = require('@grpc/grpc-js');
const protoLoader = require('@grpc/proto-loader');

const packageDefinition = protoLoader.loadSync('proto/login.proto', {
    keepCase: true,
    longs: String,
    enums: String,
    arrays: true,
});

const LoginService = grpc.loadPackageDefinition(packageDefinition).LoginService;
const client = new LoginService('127.0.0.1:3002', grpc.credentials.createInsecure());

module.exports = client;
