# url
긴 URL을 단축하여, 짧고 의미있는 형태로 제공하도록하는 단축 URL 서비스   

### Features
- Goolge Cloud Platfrom AppEngine
- Google Cloud Platform Datastore (Firestore datastore mode)
- PHP

[https://url.tl-dr.in](https://url.tl-dr.in)   

 ![image](https://user-images.githubusercontent.com/22079767/222944148-2cd15c14-5f5b-4d11-bb9b-4877449a97b5.png)


A shortened URL service that shortens long URLs to provide it in a short and meaningful form.

TL; DR : Too Long; Didn't Read

### Deploy
```
gcloud init
gcloud app deploy
```
```
hojin@hojins-MacBook-Air url % gcloud init   
Welcome! This command will take you through the configuration of gcloud.

Settings from your current configuration [default] are:
compute:
  region: asia-northeast3
  zone: asia-northeast3-a
core:
  account: jhj377@gmail.com
  disable_usage_reporting: 'False'
  project: 

Pick configuration to use:
 [1] Re-initialize this configuration [default] with new settings 
 [2] Create a new configuration
Please enter your numeric choice:  1

Your current configuration has been set to: [default]

You can skip diagnostics next time by using the following flag:
  gcloud init --skip-diagnostics

Network diagnostic detects and fixes local network connection issues.
Checking network connection...done.                                                                           
Reachability Check passed.
Network diagnostic passed (1/1 checks passed).

Choose the account you would like to use to perform operations for this configuration:
 [1] jhj377@gmail.com
 [2] Log in with a new account
Please enter your numeric choice:  1

You are logged in as: [jhj377@gmail.com].

Pick cloud project to use: 
 [1] 
 [2] 
 [3] 
 [4] 
 [5] 
 [6] 
 [7] url-358416
 [8] Enter a project ID
 [9] Create a new project
Please enter numeric choice or text value (must exactly match list item):  7

Your current project has been set to: [url-358416].

hojin@hojins-MacBook-Air url % gcloud app deploy
Services to deploy:

descriptor:                  [/Users/hojin/Documents/workspace/url/app.yaml]
source:                      [/Users/hojin/Documents/workspace/url]
target project:              []
target service:              []
target version:              []
target url:                  []
target service account:      []


Do you want to continue (Y/n)?  y

Beginning deployment of service [default]...
╔════════════════════════════════════════════════════════════╗
╠═ Uploading 19 files to Google Cloud Storage               ═╣
╚════════════════════════════════════════════════════════════╝
File upload done.
Updating service [default]...done.                                                                            
Setting traffic split for service [default]...done.                                                           
Deployed service [default] to []

You can stream logs from the command line by running:
  $ gcloud app logs tail -s default

To view your application in the web browser run:
  $ gcloud app browse
```
