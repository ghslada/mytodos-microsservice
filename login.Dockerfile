#ANTES DE EXECUTAR A IMAGEM É NECESSÁRIO GARANTIR PERMISSÃO PARA O DOCKER
#CONECTAR NO BANCO DE DADOS POIS O CONTAINER DOCKER POSSUI UM IP DIFIRENTE
#DO HOST EM QUE ESTA SENDO EXECUTADO
# troubleshoot to docker container access mysql db
# CREATE USER 'convidado'@'host.docker.internal' IDENTIFIED BY '12345';
# GRANT ALL PRIVILEGES ON *.* TO 'convidado'@'host.docker.internal' WITH GRANT OPTION;
# FLUSH PRIVILEGES;

# Imagem base derivada do Node
FROM node

# Diretório de trabalho
WORKDIR /app

# Comando para copiar os arquivos para a pasta /app da imagem
COPY . /app

# Comando para instalar as dependências
RUN npm install

# Comando para inicializar (executar) o serviço de login
CMD ["npm", "run", "exec-login"]


# Comando para criar a imagem do microsserviço a partir da definição deste arquivo

#   docker build -t mytodos/login -f login.Dockerfile ./ 

# Significado das tags: 
#   -t :     tag pela qual a imagem do serviço será identificada
#   -f :     qual arquivo está definindo o que a imagem do microsserviço executará

# Comando para executar a imagem recem criada dentro de um container docker.

#   docker run -ti --name login -p 3001:3002 mytodos/login
# Significado das tags:
#   -ti :    habilita a interação com o container via terminal
#   --name :     nome do container criado
#   -p : redireciona a porta 3001 do container para a porta 3002 do host