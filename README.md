## Installation Steps
1. Download, install, and set up xampp 
    - Start up all of the services, the localhost:8080 port, and mount the /opt/lampp in the tab Volumes
2. Download **Source Code** extract in the htdocs of xampp
    - This folder is located in ~/.bitnami/stackman/machines/xampp/volumes/root/htdocs
3. Create new database with name **monumental_anxiety** using mysql/phpadmin
4. Import **queries.sql** into the database
5. Rename project folder to whatever (I used **monumental_anxiety**)
6. After making your change, Go to the browser and run this url
 **http://localhost:8080/monumental_anxiety/homepage.php**

## Installation Steps
sudo apt update #(Only if needed)
sudo apt upgrade #(Only if needed)
sudo apt install git
git clone https://github.com/michaelbrady4/Senior_Project.git
cd Senior_Project
cd bin
chmod +x install.sh start_xampp.sh stop_xampp.sh
sudo ./install.sh
Follow through the basic set up just by clicking next until it is installed
#Click not to launch Xampp
or
#Click to launch Xampp
#When greeted with Welcome to XAMPP screen click on tab at top "Manage Serves"
#Select Apache Web Server from list and then click the "Configure" buttom on the right under the "Start" button
#Click the white Port box that says "80" and change it to "8080" and then click ok
#You can then hit the "Start All" button at the bottom of the screen or in the terminal run:
sudo ./start_xampp
Move folder into htdocs of xampp
    # cd ../..
    # sudo mv Senior_Project /opt/lampp/htdocs
Go to https://localhost/Senior_Project/homepage.php
