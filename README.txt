1. �������� ������ ����� ������ ���-�������, 
�������������� ���� ������������ Apache httpd.conf.
���������� ��������� ��������:

DocumentRoot "c:/����_�_�����/forumproject/"

<Directory "c:/wamp/www/forumproject">
    Options Indexes FollowSymLinks
    AllowOverride all
    Require local
</Directory>

2. �������������� ��������� ����������� � MySQL � �����: config/config.php.
    ���������, ��� ��������� ���� ����������.

3. ���������� � �������� �� ������: http://localhost/install/index.php
    ������ ������ ������� � ���� ������ ������ ������� � ��������� �������.
    
4. ��������� � ������ �����: http://localhost/index.php


