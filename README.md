# naoka

Use Naoka to create kanban boards easily and quickly, for you and your team.

## Configuration

### SSL
To use this project an SSL Certificate is needed, so you need to generate one.

To do that you can use [mkcert](https://github.com/FiloSottile/mkcert).
Mkcert is a simple tool for making locally-trusted development certificates.

#### Mkcert installation
You can install mkcert by following the instructions on this link : https://github.com/FiloSottile/mkcert#installation

#### Generate SSL
To generate the SSL Certificate go to the docker/certs/ directory of the project and open the terminal in this directory.
Next type the command :

```
mkcert -cert-file "naoka.io.crt" -key-file "naoka.io.key" "*.naoka.io"
```

Your SSL Certificate and his key are know generated in the certs directory.

### .ENV

If you want to personalize your docker configuration you can create a .env file at the root of the project.
You can't simply duplicate the .env.example file and keep the needed environment variables.

```
CERTIF_NAME=ssl certificat name

HTTP_PORT=http port number
HTTPS_PORT=https port number

LARAVEL_URL=laravel domain url
LARAVEL PATH=laravel directory path name

DB_PORT=database port number
DB_DATABASE=database name
DB_USERNAME=database root user name
DB_PASSWORD=database root user password

PMA_PORT=phpmyadmin port number
PMA_URL=phpmyadmin domain url

MAILCATCHER_URL=mailcatcher domain url
```

### HOSTS

Now that you have created the SSL Certificates and configured the .env file,
you need to add your domain and subdomains (For PHPmyadmin and Mailcatcher) to the hosts file of your OS

#### The line to add in the hosts file :

```
# The main website domain
127.0.0.1 naoka.io

# The phpmyadmin website subdomain
127.0.0.1 pma.naoka.io

# The mailcatcher website subdomain
127.0.0.1 mail.naoka.io
```

#### Edit hosts on macOs and linux

```
sudo vi /etc/hosts
```

Press ```A``` to edit the file and when it's done press ```Echap```, 
write ```:wq``` and finally press ```Enter```.

#### Edit hosts on Windows

Go to ```c:\Windows\System32\Drivers\etc\``` in your explorer and copy/paste the hosts file 
to your desktop. 
Right-click on the hosts file on your desktop and click "Edit".
Add the content you need and save. When the file is saved take it and drop it back in the ```c:\Windows\System32\Drivers\etc\```
directory.

#### Run the docker-compose.yaml

When all the configuration are done, open your terminal in the root directory of the project and write the command : 

```
docker-compose up -d
```

And that's it ! now you can access to your project on your browser using the domain that you configured.

### Add apache site root directory 

For the moment your server have no root directory where you add all your website file.
You need to create a directory at the root of the project. By default apache will load a directory named ```laravel```
Unless you add and fill the ```LARAVEL_URL``` variable in the .env file.






