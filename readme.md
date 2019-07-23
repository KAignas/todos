<p align="center">
<img width="200" src="https://is3-ssl.mzstatic.com/image/thumb/Purple124/v4/38/be/29/38be295d-551e-7309-b830-f378636652bf/source/512x512bb.jpg">
</p>

## Todos application
<p>
    Pagrindinės lenteles:<br>
    - <b>users</b><br>
    - <b>events</b><br>
    - <b>notifications</b><br>
    - <b>labels</b><br><br>
    Visos validatcijos atliekamos per <b>http/requests</b><br><br>
    Pagrindiniai controller'iai yra<br>
    - <b>EventsController</b><br>
    - <b>ImagesController</b><br><br>
    Event modelis turi savo observer'į kuris modifikuoja tam tikrus duomenis išsaugojimo metu (<b>App\Observers\EventObserver</b>)<br><br>
    Tokie veiksmai kaip  <b>Update ir delete</b> yra autorizuojami (<b>App\Policies\EventPolicy</b>)
    
   <b>P.s.: Kiekvieną veiskmą [create, update, delete] galima atlikti per "ajax request'us", bet nemačiau tam butinybės norint atlikti užduotį. Taip pat neregistravau eventų (send email arba sms) po registracijos ir event'o sukūrimo.</b>
</p>

# Dependencies

- Css framework: <br>
    [tailwindcss](https://tailwindcss.com)

- Js plugins:<br> 
    [Selectize.js](https://selectize.github.io/selectize.js/),
    [Airpicker.js](http://t1m0n.name/air-datepicker/docs/),
    [Autosize.js](https://github.com/jackmoore/autosize)
    
- Own js scripts:<br>
    [resources/js/vendor/_.js] | Papildomi metodai kuriuos dažnai naudoju. Nereikalingas Jquery<br>
    [resources/js/vendor/events.js] | Event'ų registracija<br>
    [resources/js/vendor.router.js] | Routing'o sistema. Ji labai paprasta, bet stengiausi padaryti kuo panašesnę į Laravel<br>
    
- Database structure:
    [database/model.mwb] | Paprastai naudoju <b>MySQL Workbench</b> susikurti duomenų bazei
    [Database structure image](https://gyazo.com/2a15f7c0a0ddb60a1693624ab771bbd9)
    
- [Intervention Image](http://image.intervention.io/getting_started/installation)
- [Intervention Image Cache](http://image.intervention.io/use/cache)


# Debugging

- [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar)
    

# Be registracijos
    - php artisan migrate
    - php artisan app:init
    - php artisan serve
    
<p>Sukūriau "artisan" comandą, kad nereiktu registruotis.</p>
<p>Paleidus <b>"php artisan app:init"</b><br> 
automatiškai sukuriamas <b>vartotojas ir 10 event'ų</b></p>
----------------------------------
<p>Email: <b>todos@todos.com</b></p>
<p>Password: <b>root</b></p>
----------------------------------
