# pdftools
Installation

git clone https://github.com/jteja/pdftools.git

cd pdftools

docker build -t pdf_tools .

docker run -p 80:80 --name pdf_tools pdf_tools:latest
