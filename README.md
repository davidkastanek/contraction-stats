# Constraction stats
This application is able to track duration of contractions during labor, calculate interval length between contractions and provide average statistics for last hour.

![alt text](https://raw.githubusercontent.com/davidkastanek/contraction-stats/master/doc/app.png)
## How to use
You need to have `docker-compose` installed on your system. 
Run `docker-compose up -d kastanek/contraction-stats` to launch the app. Then access http://localhost:8120/www/index.php from your browser. The rest is simple. Click "Start contraction" button, if contraction starts and click "End contraction" when it finishes. The app will then instantly provide you with statistics.

If you make a mistake, you can edit all the logged data manually using build in phplite database browser. Just access http://localhost:8121/phpliteadmin.php - password is "admin" (without quotes).
## The story
I coded this app in 2 hours, while I was sitting next to my wife, which was going through her 8th hour of contractions, while giving birth to our 2nd child. Doctors told as the we should wait for 5 minute intervals between contractions, lasting at least 50 seconds, until we would drive to the hospital. After writing down a couple of contractions on a piece of paper, I decided to cut the endless waiting and do this really fast, poorly written application to make our life a little easier.

Before we departed to the hospital, we managed to log 54 contractions, never actually reaching the insane threshold requested by the doctors :D ... Despite all that, our son made it OK and he is more than fine now :)

Enjoy and all the best!

![alt text](https://raw.githubusercontent.com/davidkastanek/contraction-stats/master/doc/img.png) 

## Development

The code is terrible. Do not look at the code! ;-)

---
*Legal disclaimer: Limitation of Liability. Under no circumstances shall the developer of this application be liable for any indirect, incidental, consequential, special or exemplary damages arising out of or in connection with your use of the application.*