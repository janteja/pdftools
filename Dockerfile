FROM centos:latest
EXPOSE 80:80
RUN yum update -y
RUN yum install -y  \
    wget \
    pcre-devel \
    git \
    lynx
RUN yum groupinstall -y 'Development Tools'
RUN yum -y localinstall 'https://www.linuxglobal.com/static/blog/pdftk-2.02-1.el7.x86_64.rpm'
RUN yum -y install libxml2-devel
RUN yum install -y expat-devel
RUN wget 'http://apache.mirror.vexxhost.com//httpd/httpd-2.4.29.tar.gz'
RUN tar xfv httpd-2.4.29.tar.gz
RUN wget http://apache.forsale.plus//apr/apr-1.6.3.tar.gz
RUN wget http://apache.forsale.plus//apr/apr-util-1.6.1.tar.gz
RUN tar xfv apr-util-1.6.1.tar.gz
RUN tar xfv apr-1.6.3.tar.gz
RUN mv apr-1.6.3 httpd-2.4.29/srclib/apr
RUN mv apr-util-1.6.1 httpd-2.4.29/srclib/apr-util
RUN httpd-2.4.29/configure  --with-included-apr --prefix=/usr/local/apache
RUN make
RUN make install
RUN wget -O php.tar.gz http://us3.php.net/get/php-7.1.4.tar.bz2/from/this/mirror
RUN tar xfv php.tar.gz
RUN yum -y install openssl-devel
RUN php-7.1.4/configure --with-apxs2=/usr/local/apache/bin/apxs --enable-mbstring --with-openssl 
RUN make
RUN make install
RUN echo -e "<IfModule mime_module> \n AddType text/html .php .phps \n</IfModule> \n<IfModule dir_module> \nDirectoryIndex index.html index.php \n</IfModule> \nAddType  application/x-httpd-php        .php \nAddType  application/x-httpd-php-source  .phps \n <Directory "/usr/local/apache/htdocs"> \n    Options -Indexes \n        AllowOverride None \n    Require all granted \n </Directory> " >> /usr/local/apache/conf/httpd.conf
RUN git clone 'https://github.com/jteja/pdftools.git' 
RUN mv pdftools/* /usr/local/apache/htdocs/
RUN rm -rf pdftools
RUN rm -rf /usr/local/apache/htdocs/pdftools /usr/local/apache/htdocs/index.html
RUN mkdir /usr/local/apache/htdocs/uploads
RUN chmod 777 /usr/local/apache/htdocs/uploads
RUN rm -rf http*
RUN rm -rf apr*
RUN cp /php-*/php.ini-production /usr/local/lib/php.ini
RUN yum install -y ImageMagick*
RUN printf "\n" | pecl install imagick
RUN echo "extension=imagick.so" >> /usr/local/lib/php.ini
CMD ["/usr/local/apache/bin/apachectl","-D","FOREGROUND"]
