#!/usr/bin/env bash

echo "load provision scripts"

## update
sudo apt-get update
sudo apt-get -y install software-properties-common


## install apache2

echo "install apache2"

sudo apt-get install -y apache2
if ! [ -L /var/www/html ]; then
  rm -rf /var/www/html
  ln -fs /vagrant/www /var/www/html
fi

## install php7.0

echo "install php7"

sudo apt-get install -y php7.0
sudo apt-get install -y php7.0-fpm
sudo apt-get install -y php7.0-gd php7.0-curl php7.0-mbstring php7.0-xml php7.0-mysql
sudo apt-get install -y libapache2-mod-php7.0

## install mariadb

echo "install mariadb"

sudo apt-key adv --recv-keys --keyserver hkp://keyserver.ubuntu.com:80 0xF1656F24C74CD1D8
sudo add-apt-repository 'deb [arch=amd64,i386,ppc64el] http://ftp.kaist.ac.kr/mariadb/repo/10.1/ubuntu xenial main'
sudo apt update
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
sudo apt install -y mariadb-server

sudo sed -i "s/^[#\s]*bind-address\s*=.*/bind-address = 0.0.0.0/" /etc/mysql/my.cnf
sudo service mysql restart

mysql --user=root --password=root -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'root' WITH GRANT OPTION; FLUSH PRIVILEGES;"
