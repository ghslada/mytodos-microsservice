#troubleshooting docker access to db
CREATE USER 'convidado'@'172.27.224.1' IDENTIFIED BY '12345';
GRANT ALL ON *.* TO 'convidado'@'172.27.224.1';
FLUSH PRIVILEGES;
FLUSH PRIVILEGES;