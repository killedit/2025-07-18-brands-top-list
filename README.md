# RESTful API to manage brands top list.

## Installation
Tested in the process of writing the documentation.

1. Required: [docker](https://docs.docker.com/engine/install/), [docker-compose](https://docs.docker.com/compose/install/linux/#install-the-plugin-manually).

    docker version
    docker compose version

2. Clone the repository in a directory of choice.

    git clone https://github.com/killedit/2025-07-18-brands-top-list.git
    cd 2025-07-18-brands-top-list

2. Build the docker containers.

    docker compose up -d --build

3. Attach to a container if needed.

    docker ps -a
    docker exec -it {container-name} bash

4. DB migrations are essential to Laravel.

    docker exec -it brands-top-list-app bash
    ls -lah # should be in the application directory
    php artisan migrate
    exit;

5. Attach to MySQL container to check the tables are created.
    
    docker exec -it brands-top-list-mysql mysql -u btl_user -p -D brands_top_list
        Enter password:
    show databases;
    use brands_top_list
    show tables;
    exit;

6. Optional. Create a new database connection in DBeaver.

    Server Host:    localhost
    Port:           3307
    Database:       brands_top_list
    Username:       btl_user
    Password:       btl_password

    Test Connection...

7. Load the application.

    http://localhost:8080/




    