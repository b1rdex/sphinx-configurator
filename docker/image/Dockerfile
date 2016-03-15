FROM ubuntu:14.04

RUN apt-get update
RUN apt-get -y install mysql-client unixodbc libpq5

#install sphinx
RUN apt-get -y install wget
RUN wget http://sphinxsearch.com/files/sphinxsearch_2.2.10-release-0ubuntu12~trusty_amd64.deb
RUN dpkg -i sphinxsearch_2.2.10-release-0ubuntu12~trusty_amd64.deb
RUN unlink sphinxsearch_2.2.10-release-0ubuntu12~trusty_amd64.deb

# make sphinx dirs
RUN mkdir /var/lib/sphinx
RUN mkdir /var/lib/sphinx/data
RUN mkdir /var/log/sphinx
RUN mkdir /var/run/sphinx