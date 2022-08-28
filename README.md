
# FabLab

Dit is een project voor het vak Backend Web. Scope is als volgt: 
"De website die jullie opbouwen zal dienen voor het FabLab. 
Ze willen dat studenten geld kunnen "opladen" op hun studentenkaart. 
Dat tegoed kunnen ze vervolgens gebruiken om materiaal aan te kopen dat ze verbruiken in de labs. 
Het opladen van de kaart gaat gebeuren met behulp van een RFID-reader die de unieke code van de kaart gaat uitlezen (maar voor dit voorbeeld kunnen we een fictieve uuid gebruiken om te testen."


## Resources

Bronnen van enkele geraadpleegde sites. 

Code bronnen:
- [Laravel Documentation](https://laravel.com/docs/9.x)
- [Last key of loop](https://laracasts.com/discuss/channels/general-discussion/get-last-loop-in-laravel-foreach-loop)
- [Delete sessions](https://www.google.com/search?q=delete+session+laravel&rlz=1C5CHFA_enBE915BE915&oq=delete+session+&aqs=chrome.3.69i57j0i512l6j69i60.4805j0j4&sourceid=chrome&ie=UTF-8)
- [Update Cart](https://www.youtube.com/watch?v=0axqYe2VBRU)
- [Paypal Integration](https://hackthestuff.com/article/paypal-payment-gateway-integration-in-laravel-8)
- [Image to url](https://nl.imgbb.com/)
- [Arrays & Session](https://laravel.io/forum/07-17-2014-storing-removing-and-updating-arrays-within-a-session)
- [Password Forgotten](https://laravel.com/docs/9.x/passwords#password-reset-link-handling-the-form-submission)
- [Mailtrap.io](https://mailtrap.io/)


Styling bronnen:
- [Bootstrap](https://getbootstrap.com/)
- [Checkout Template (modified)](https://mdbootstrap.com/docs/standard/extended/order-details/)
- [Settings Template (modified)](https://www.bootdey.com/snippets/tagged/settings)
- [Cart Template (modified)](https://mdbootstrap.com/docs/standard/extended/shopping-carts/)
- [Canva](https://www.canva.com/)
## Before

Paypal 
```bash
  composer require srmklive/paypal:~3.0
```
Seeders
```bash
  php artisan migrate:fresh --seed
```
Start
```bash
  php artisan serve
```
Login Credentials 
- admin@ehb.be: 123456
- dark.magician@student.be: dark
## Features

- User login
- Admin login
- Admin panel
- Paypal Integration
- Webshop


## Explanation
Admin kan inloggen, users, producten & admins aanmaken. Producten, users en admins aanpassen en verwijderen. 
Ook kan een admin de kaarthouders en hun saldo bekijken, en aankopen zien, ook de status van de aankopen kan de admin zien. 
Deze kunnen ze telkens sorteren op een bepaalde filter. 

Users kunnen inloggen, ze kunnen dan hun kaart opladen. Betalen gebeurt via Paypal, ze kunnen ook op de settings icon drukken en 
daar wat meer info vinden over hun profiel. Nadien (ingelogd of niet) kunnen deze aankopen maken. 


Enkele zaken die ik niet heb kunnen doen.
BTW toevoegen, ik wist niet of dit per product of per totaal moest zijn, ook heb ik dit niet kunnen doen wegens tijd gebrek. 
"Als het de eerste keer is dat de kaart opduikt in het systeem vragen we ook de naam van de student", dit stukje heb ik niet gedaan. Op mijn site kan je uw kaart niet herladen, als 
je niet bent ingelogd.

Forget password is mij niet gelukt. Ik kreeg een Expected response code "250" but got code "530", with message "530 5.7.1 Authentication required" error.
Volgens het internet moest ik in mijn env. file en mail.php de encryption leeg laten. 
Dit heb gedaan, daarna deed ik ook telkens php artisan config:cache, maar het werkte niet. 

Alle kleine designs zijn door mij gemaakt via de Canva. 

## Author

- [@Oumaima](https://github.com/JDogMad)

