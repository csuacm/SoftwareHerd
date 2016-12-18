Software Herd:

This repository is for the files in your software_herd project folder on your computer.  You could use it within the VM as well.  

Begin by setting up the Homestead virtual machine: https://laravel.com/docs/5.3/homestead

Somewhere on your computer create a folder named SH_DevFolder. This is the folder to be shared with Homestead. Initially/Default folder is "Code".  This takes the place of Code.  

Homestead.yaml:

folders:

    - map: ~/(WHERE YOU PLACED THIS FILE)/SH_DevFolder
    
      to: /home/vagrant/SH_DevFolder
      

sites:

    - map: softwareherd.app
    
      to: /home/vagrant/SH_DevFolder/software_herd/public
      
      
Within your VM (SSH) go into SH_DevFolder and run this command.  This creates the project in your shared folder.
composer create-project laravel/laravel software_herd --prefer-dist

Run:
vagrant reload --provision

After any changes to the .yaml file.  You should now be able to go to softwareherd.app in your browser and see the laravel home page.

We will be using Sequel Pro for the database. This video explains how to link the two.
https://www.youtube.com/watch?v=rW4GwUuvsl4
https://www.sequelpro.com/


