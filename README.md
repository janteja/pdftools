# pdftools



# About
pdftools allows you to create a server based tool that allows you to compress,merge and cut PDFs. The server is run inside a docker making it easy to be installed on many different platforms.



- Requires Docker.

# How to install docker on RHEL/CentOS:

    # Add Repo
    sudo yum-config-manager \
    --add-repo \
    https://download.docker.com/linux/centos/docker-ce.repo
    
    # Install Docker
    sudo yum install docker-ce docker-ce-cli containerd.io
    
    # Enable Docker
    sudo systemctl start docker



# Installation

    git clone https://github.com/jteja/pdftools.git
    cd pdftools
    docker build -t pdf_tools .
    # Start
    docker run -p 80:80 --name pdf_tools pdf_tools:latest

# Gallery

![alt text](https://i.imgur.com/0S4XrSu.png)
![alt text](https://i.imgur.com/yUd2Yuv.png)
