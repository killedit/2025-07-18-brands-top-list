# RESTful API to manage brands top list.

## Installation
/It has been tested in the process of writing the documentation./

1. Required: [docker](https://docs.docker.com/engine/install/), [docker-compose](https://docs.docker.com/compose/install/linux/#install-the-plugin-manually).

2. Clone the repository to a directory of choice.

    ```
    git clone https://github.com/killedit/2025-07-18-brands-top-list.git
    ```
    ```
    cd 2025-07-18-brands-top-list
    ```

2. Build the containers. Check for errors, i.e. a port could be in use by another process.

    ```
    docker compose up -d --build
    ```

3. DB migrations and seeding are handled in the entry point bash script.

    `docker/php/entrypoint.sh`

4. Check if db tables are created.

    <u>Option 1:</u> Attach to MySQL container.

    ```
    docker exec -it brands-top-list-mysql mysql -u btl_user -p -D brands_top_list

        show databases;
        use brands_top_list;
        show tables;
        exit;
    ```
    
    <u>Option 2:</u> Create a new database connection in DBeaver.

    ```
    Server Host:    localhost</br>
    Port:           3307</br>
    Database:       brands_top_list</br>
    Username:       btl_user</br>
    Password:       btl_password</br>

    Test Connection...
    ```

5. Load the application.

    http://localhost:8081/

6. To edit records login as `Test User` or create your own, i.e. <em>Register</em>:

    ```
    Email:      test@example.com
    Password:   test
    ```

## Logic behind the application

User | Operation
--|--
Guest | Only view top list based on `CF-IPCountry`.
Authenticated | Possibility to create/read/update/delete brands.</br><em>Authentication and requests are kept simple, but should be securited with email verification, 2FA, tokens, expiration, encryption, request signatures to ensure data protection.</em>

## Endpoints



    