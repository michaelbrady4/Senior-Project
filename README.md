## Installation Steps
1. Updates to system (Only if needed)
    - $ sudo apt update
    - $ sudo apt upgrade
2. Install Git and clone repository
    - $ sudo apt install git
    - $ git clone https://github.com/michaelbrady4/Senior_Project.git
3. Navigate to the cloned project and bin
    - $ cd Senior_Project
    - $ cd bin
4. Make files executable
    - $ chmod +x install.sh start_xampp.sh stop_xampp.sh
5. Run installation file
    - $ sudo ./install.sh
6. Follow through the basic set up screen that will pop up, just by clicking next until it is installed
    - At the end when asked, click not to launch Xampp
7. Start Xampp servers
    - $ sudo ./start_xampp
8. Move folder into htdocs of xampp
    - $ cd ../..
    - $ sudo mv Senior_Project /opt/lampp/htdocs
9. Create and populate database
    - Go to https://localhost/dashboard
    - Click on tab in the blue nav bar in the top right that says "phpMyAdmin"
    - Click on the "New" button 
    - Input name "monumental_anxiety" in the Create database box and click create
    - Click on the "Import" tab in light grey to the right of the "Export" tab
    - Click the "Browse" button and select the file "queries.sql" from the bin in the Senior_Project file that was just moved to /opt/lampp/htdocs 
        - That file path will be /opt/lampp/htdocs/Senior_Project/bin/queries.sql
    - Click the "Go" button
    - This now successfully populated the database
10. View site    
    - Go to https://localhost/Senior_Project/homepage.php
