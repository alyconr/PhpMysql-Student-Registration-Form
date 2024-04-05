<div align="center">
 <h1 style="font-size: 30px; color: #FF0000">PHP Student Registration Form</h1>
 </div>


The PHP Student Registration App is a web-based application designed to facilitate  student registration processes. Developed primarily for educational purposes, it serves as a practical example for learning various Docker-related concepts including Docker, Dockerfiles, Docker volumes, Docker networks,ports, and Php and Mysql.

This application provides an unique and engaging user experience by utilizing Docker containers, Dockerfiles, Docker volumes, Docker networks, and ports.

In addition to its functional aspects, the PHP Student Registration App serves as a hands-on learning tool for understanding php's application lifecycle and containerization with Docker. By employing Docker containers, Dockerfiles, and associated Docker functionalities, learners gain practical insights into managing dependencies, scaling applications, and orchestrating components effectively within a containerized environment.
## Table of Contents

1. [Features](#features)
2. [Getting Started](#getting-started)
3. [Prerequisites](#prerequisites)
4. [Installation](#installation)
5. [Usage](#usage)
6. [Folder Structure](#folder-structure)
7. [Technologies Used](#technologies-used)
8. [Credits](#contributing)
9. [Contributing](#contributing)
10. [License](#license)
11. [Documentation](#documentation)

## Features

### Docker containerization:

- Guides learners through the process of creating Dockerfiles to define the environment and dependencies required for running the application.

### Docker volumes:

- Helps learners understand how Docker volumes work and how they can be used to share data between containers.

### Docker networks:

- Helps learners understand how Docker networks work and how they can be used to isolate applications from each other.

## Getting Started

### Prerequisites

- [Docker](https://www.docker.com/)
- [PHP](https://www.php.net/)
- [Mysql](https://www.mysql.com/)

### Installation

```bash	

git clone git@github.com:alyconr/PhpMysql-Student-Registration-Form.git
```

Build the image with Dockerfile:

```bash

cd PhpMysql-Student-Registration-Form
cd DB
docker build -t mysqlimage .
cd ..
cd Public
docker build -t webimage .
cd ..
```


## Usage

Run the following commands to start the application:

```bash
cd PhpMysql-Student-Registration-Form
cd Public
docker run -d -p 80:80 --name webcontainer --network mywebsql  webimage
cd ..
cd DB
docker run -d -p 3307:3306 --name  mysql_container --network mywebsql   mysqlimage
cd ..
```

Or use Docker Compose:

```bash
cd PhpMysql-Student-Registration-Form
docker-compose up -d
```

## Folder Structure


```bash

PhpMysql-Student-Registration-Form
├── DB
│   └── Dockerfile
├── Public
│   └── Dockerfile
└── README.md
```


## Technologies Used

- Docker
- Dockerfiles
- Docker volumes
- Docker networks
- Php
- Javascript and Ajax
- Mysql


## Credits

The code for this project is available on GitHub:

https://github.com/alyconr/PhpMysql-Student-Registration-Form

### Author


- GitHub: [@alyconr](https://github.com/alyconr)
- LinkedIn: [LinkedIn](https://www.linkedin.com/in/jeysson-aly-contreras/)

## Contributing

If you would like to contribute to the project, please read the [Contributing Guide](https://github.com/alyconr/NodeJs-Jobs-Api/blob/main/CONTRIBUTING.md).

## License

This project is licensed under the MIT License.

## Documentation

You can find the documentation for this project on GitHub: [https://github.com/alyconr/PhpMysql-Student-Registration-Form](https://github.com/alyconr/PhpMysql-Student-Registration-Form)


