# Deploy to Bluemix simple CRUD application using PHP and codeigniter


PHP developers still spend a lot of time configuring systems and servers to get a PHP application up and running. PHP developers usually go through this lifecycle every time starting a project. Luckily, there are services out there that take all this grunt work out of creating web applications, such as IBM Bluemix.   

In this tutorial, we’ll create a web application with a simple Create, Read, Update and delete (CRUD) functionality. We will use  PHP as the runtime and codeigniter as our framework, we will then bind the application to the database using the ClearDB MySql service on Bluemix and and deploy it to Bluemix.   

By the end of our tutorial, our web app will provide a very basic way to Create, Read, Update and delete blogs and you will learn how to push a PHP codeigniter application to Bluemix and how to setup the services on IBM Bluemix. You will also learn the changes to make to your application when moving your data from local environment to Bluemix. CRUD application will be looking like this

  ![](https://github.com/IBM-Bluemix/CRUD-PHP-Codeigniter-Bluemix/blob/master/assets/gitImages/ApplicationScreen.png)

#### Application Requirements and services
* Bluemix account, if don't have one then [create a free account here](https://console.ng.bluemix.net/registration/?cm_mc_uid=96004954366914328197330&cm_mc_sid_50200000=1452167836)
* PHP runtime on Bluemix
* ClearDB MySql database

  
####Quick Deployment:
You can simply press the deploy to Bluemix button and it will deploy the complete application to your Bluemix account without doing any of the steps below.

[![Deploy to Bluemix](https://bluemix.net/deploy/button.png)](https://bluemix.net/deploy?repository=https://hub.jazz.net/git/twanawebtech/CRUD-PHP-Codeigniter-Bluemix)

Or if you want to learn how the fully process is done and how I went about doing this then follow the steps below:


####Manual setup steps:

Step 1
* Using the cloud foundry command line, login to Bluemix and navigate to the organization and space you want to push your app too  
```
cf login  
Enter your Bluemix email and password, then navigate to your org and space which you want  
```

Step 2
* Create the database service on Bluemix, in this example we are using the ClearDB MySql service
```  
cf create-service cleardb spark myDatabaseCRUD  
```

Step 3
* Download the source code and rename the folder to a unique application name in which you want your application to be called. For my example I called my application "CRUD-PHP-Codeigniter-Bluemix".

Step 4
* Edit the "manifest.yml" file to update the application name which in my case is "CRUD-PHP-Codeigniter-Bluemix" and the database service name which in my case been called "myDatabaseCRUD", after that we are good to go to push our application to Bluemix.  
(The manifest.yml is a file which holds all the Bluemix configurations listing all the services and application setup).  

Step 5
* To push your application to bluemix, we need to inside the application directory so navigate to that folder.  
```
cd desktop/CRUD-PHP-Codeigniter-Bluemix  
```
  
Step 6
* Push the applications to Bluemix, to do that use below command  
```
cf push CRUD-PHP-Codeigniter-Bluemix -b https://github.com/cloudfoundry/php-buildpack -s cflinuxfs2  
``` 

####Done!  
We should now be in action, access your application staging domain, in my case been: 
[crud-php-codeigniter-bluemix.mybluemix.net](http://crud-php-codeigniter-bluemix.mybluemix.net)    


####Access and View your database
To get your mySql database details run below command to get your details if you want to check the database.  
```
cf env CRUD-PHP-Codeigniter-Bluemix
```
Or you can get the database details via Bluemix dashboard, login to your Bluemix and open your applications which we created and click on the "Show Credentials" button under the MySql Database service.  


####Troubleshooting

The primary source of debugging information for your Bluemix app is the logs. To see them, run the following command using the Cloud Foundry CLI:

  ```
  $ cf logs <application-name> --recent
  ```
For more detailed information on troubleshooting your application, see the [Troubleshooting section](https://www.ng.bluemix.net/docs/troubleshoot/tr.html) in the Bluemix documentation.



#### Useful links
[IBM Bluemix](https://bluemix.net/)  
[IBM  Bluemix Documentation](https://www.ng.bluemix.net/docs/)  
[IBM Bluemix Developers Community](http://developer.ibm.com/bluemix)  


####Whats next?   

On our next article we will bind a storage service to our application to store images and files.  

