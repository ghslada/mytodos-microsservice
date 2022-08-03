const express = require('express');
const UsersService = require('./users');
const loginService = require('./login');
const AssignmentStatusService = require('./assignment_status');
const AssignmentService = require('./assignment');
const pathhh = require("path");
const cors = require('cors');
const { path } = require('express/lib/application');
const bodyParser = require('body-parser');
var multer = require('multer');
var forms = multer();
const cookieParser = require("cookie-parser");


const app = express();
app.use(cors());
app.use(forms.array());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
// app.use(bodyParser.)
app.use(cookieParser());

/**
 * Retorna a lista de produtos da loja via InventoryService
 */

 app.get('/user/proto', (req, res, next) => {

            var options = {
                root: pathhh.join(__dirname+'../../../proto')
            }
            res.sendFile("users.proto", options, function (err) {
                if(err) {
                    next(err);
                } else {
                    console.log('Sent file: /proto/users.proto')
                }
            });
});

app.get('/users', (req, res, next) => {
    UsersService.GetUsers(null, (err, data) => {
        if (err) {
            console.error(err);
            res.status(500).send({ error: 'something failed :(' });
        } else {
            res.json(data.users);
        }
    });
});

app.get('/users/:id', (req, res, next) => {
    // Chama método do microsserviço.
    if(req.cookies){
        if(req.cookies.id==req.params.id){
            UsersService.GetUser({ id: req.params.id }, (err, user) => {
                // Se ocorrer algum erro de comunicação
                // com o microsserviço, retorna para o navegador.
                if (err) {
                    console.error(err);
                    res.status(500).send({ error: 'something failed :(' });
                } else {
                    // Caso contrário, retorna resultado do
                    // microsserviço (um arquivo JSON) com os dados
                    // do produto pesquisado
                    res.json(user);
                }
            });
        }else {
            res.status(500).send({ error: 'Not allowed to get this User data.' });
        }
    }else {
        // console.error(err);
        res.status(500).send({ error: 'Login to get your cookie' });
    }
    
});

app.get('/login/proto', (req, res, next) => {

    var options = {
        root: pathhh.join(__dirname+'../../../proto')
    }
    res.sendFile("login.proto", options, function (err) {
        if(err) {
            next(err);
        } else {
            console.log('Sent file: /proto/login.proto')
        }
    });
});

app.post('/login', (req, res, next) => {
    // Chama método do microsserviço.
    console.log(JSON.stringify(req.body));
    const userRequest={ email : req.body.email, senha : req.body.senha };
    loginService.Login(userRequest, (err, user) => {
        // Se ocorrer algum erro de comunicação
        // com o microsserviço, retorna para o navegador.
        if (err) {
            console.error(err);
            res.status(500).send({ error: 'Something failed, try again later' });
        } else {
            // Caso contrário, retorna resultado do
            // microsserviço (um arquivo JSON) com os dados
            // do produto pesquisado
            if(user.id && user.email){
                res.cookie('id', user.id);
                res.json(user);
            }else {
                res.status(400).send({ error: 'Invalid email.' });
            }
        }
    });
});

app.get('/assignment/status/proto', (req, res, next) => {

    var options = {
        root: pathhh.join(__dirname+'../../../proto')
    }
    res.sendFile("assignment_status.proto", options, function (err) {
        if(err) {
            next(err);
        } else {
            console.log('Sent file: /proto/assignment_status.proto')
        }
    });
});

app.get('/assignment/status', (req, res, next) => {
    // Chama método do microsserviço.
    console.log(JSON.stringify(req.body));
    // const userRequest={ email : req.body.email, senha : req.body.senha };
    // console.log(JSON.stringify(req.body));
    const userRequest={ email : req.body.email, senha : req.body.senha };
    AssignmentStatusService.GetAssignmentStatus( {}, (err, assignmentStatusSet) => {
        // Se ocorrer algum erro de comunicação
        // com o microsserviço, retorna para o navegador.
        if (err) {
            console.error(err);
            res.status(500).send({ error: 'Something failed, try again later' });
        } else {
            // res.cookie('id', assignmentStatusSet.id);
            res.json(assignmentStatusSet);
        }
    });
});

app.post('/assignment/', (req, res, next) => {
    // Chama método do microsserviço.
    console.log(JSON.stringify(req.body));
    const body = JSON.parse(JSON.stringify(req.body));
    // console.log('Body:'+JSON.stringify(req.body));
    const newAssignments = body.newAssignmentSet;

    if ( typeof newAssignments === 'undefined' ){

        const newAssignment = req.body;

        if ( typeof newAssignment.assigned_to_id === 'undefined' ) {
    
            newAssignment.assigned_to_id = newAssignment.owner_id;

        }
        if ( typeof newAssignment.assignment_types_id === 'undefined' ) {

            newAssignment.assignment_types_id = 1;
            
        }

        body.newAssignmentSet = [newAssignment];

    } else {

        newAssignments.forEach( newAssignment => {
            if ( typeof newAssignment.assigned_to_id === 'undefined' ) {
    
                newAssignment.assigned_to_id = newAssignment.owner_id;
    
            }
            if ( typeof newAssignment.assignment_types_id === 'undefined' ) {
    
                newAssignment.assignment_types_id = 1;
                
            }
        });

    }

    console.log(JSON.stringify(body));

    AssignmentService.NewAssignmentSet( body, (err, newAssignmentSetResponse) => {
        // Se ocorrer algum erro de comunicação
        // com o microsserviço, retorna para o navegador.
        if (err) {
            console.error(err);
            res.status(500).send({ error: 'Something failed, try again later' });
        } else {
            // res.cookie('id', assignmentStatusSet.id);
            if(newAssignmentSetResponse.newAssignmentSetResponse.length==0){
                res.status(400);
            }
            res.json(newAssignmentSetResponse);
        }
    });
});

app.get('/user/:user_id/assignment/', (req, res, next) => {
    // Chama método do microsserviço.
    // const userRequest={ email : req.body.email, senha : req.body.senha };
    // console.log(JSON.stringify(req.body));
    const params = JSON.parse(JSON.stringify(req.params));
    console.log('Params: '+JSON.stringify(params));
    const assignmentRequest={ user_id : parseInt(params.user_id) };
    AssignmentService.GetAssignments( assignmentRequest, (err, assignmentSet) => {
        // Se ocorrer algum erro de comunicação
        // com o microsserviço, retorna para o navegador.
        if (err) {
            console.error(err);
            res.status(500).send({ error: 'Something failed, try again later' });
        } else {
            // res.cookie('id', assignmentStatusSet.id);
            res.json(assignmentSet);
        }
    });
});

/**
 * Inicia o router
 */
app.listen(3000, () => {
    console.log('Controller Service running on http://127.0.0.1:3000');
});
