<div class="report">
    <h2>Kmom01</h2>
    <h4>Hur känns det att hoppa rakt in i klasser med PHP, gick det bra? </h4>
    <p>
        Det känns bra att börja med klasser direkt. Eftersom vi läste oopython så har jag redan lite erfarenhet av
        klasser och objekt. Det har gjort att det inte känns väldigt svårt utan flyter på bra. Det gick bra att börja
        direkt. Jag har inte stött på några problem än men de kommer nog senare när det blir mer avancerade saker vi
        jobbar med. Men som sagt så gick det smidigt då jag redan hade kunskap om klasser från oopython.
    </p>
    <h4>Berätta om dina reflektioner kring ramverk, anax-lite och din me-sida. </h4>
    <p>
        Det var väldigt många saker som jag var tvungen att få rätt på för att få ramverket att fungera. Just nu i
        början har vi inte fått skriva så mycket kod till ramverket utan vi fick mycket för att få igång det. Det ska
        bli roligt att få bygga ut ett ramverk och sätta min egna personlighet på det och få det att se ut som jag vill.
        Me-sidan var inte svår att göra. Eftersom vi gick igenom mycket i övningen så var det inga problem. När jag
        skulle göra designen till me-sidan tog jag saker från designkursen för att det kändes bäst då jag hade koll på
        hur det fungerade och det är också lätt att använda.
    </p>
    <h4>Gick det bra att komma igång med MySQL, har du liknande erfarenheter sedan tidigare? </h4>
    <p>
        Det gick väldigt bra att komma igång med MySQL. Jag gjorde de första 8 övningarna och det var inga problem att
        göra dessa. Då jag hade lite erfarenhet av SQL sedan tidigare så var det inga problem. Första gången jag använde
        SQL var när jag gick i gymnasiet och sedan under htmlphpkursen. Därför kändes det som väldigt lätta övningar.
    </p>
    <h2>Kmom02</h2>
    <h4>Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika
        sätten?</h4>
    <p>Det känns väll helt okej. Ser inte så stor skillnad. En fördel med att skiva kod direkt till ramverket är att man
        kan använda koden i alla vyer vilket gör ens arbete enklare. Som till exempel session. Mycket smidigt att lägga
        till det direkt in i ramverket då det används väldigt ofta. Annan kod som till exempel tärningsspelet känns inte
        som det har att göra inuti ramverket då det bara används 1 gång.
    </p>
    <h4>Hur väljer du att organisera dina vyer?</h4>
    <p>Alla mina vyer ligger i mappen view. Jag har valt att lägga alla vyer till dice, navbar och session i egna
        undermappar. Andra vyer som 404, header och footer m.fl finns i mappen take1.
    </p>
    <h4>Berätta om hur du löste integreringen av klassen Session.</h4>
    <p>
        Jag började med att lägga till ett namespace i session klassen. Sedan lade jag till session i frontkontrollern
        så att $app får tillgång till att använda session. Jag har försökt att hålla så lite kod som möjligt i mina
        session vyer men det gick sådär. Jag har 6 olika vy filer som gör olika saker. Ett exempel är increment som
        ändrar värdet på siffran som vissas. När man är inne på session routen och klickar på increment knappen så ökar
        värdet med 1 och man blir redirectad tillbaka till session routen.
    </p>
    <h4>Berätta om hur du löste uppgiften med Tärningsspelet 100/Månadskalendern, hur du tänkte, planerade och utförde
        uppgiften samt hur du organiserade din kod?</h4>
    <p>Jag valde att göra tärningsspelet 100 då jag tyckte det lät roligare att göra ett spel istället för en kalender.
        I mappen Dice ligger 2 stycken filer. Dice.php och Game.php. I Dice har jag endast 1 funktion och det enda den
        gör är att rulla tärningen. I Game skapar jag först en ny tärning och två stycken spelare som läggs in i en
        array. Jag har en funktion switchPlayer() som byter spelare så att alla får spela. Jag har några funktioner som
        hjälper till med utskriften på sidan och dessa är getRolls som ger en sträng med de kast man har gjort under en
        tur. getPlayerScore() som returnerar spelarnas poäng och Game() som skötter hur spelet fungerar. Game() tar in
        ett argument som är $state vilket kan vara roll eller save. På webbsidan finns det tre olika knappar. 2 som syns
        när spelet är igång och 1 som kommer fram när man kan starta om spelet. Om man klickar på knappen roll så sätts
        $state till roll och där inne kollas det om man ska lägga till poäng eller byta spelare. Om man klickar på save
        kommer alla poäng man har samlat att läggas till på ens poäng och sedan byts spelarna. När någon spelare har
        fått över 100 poäng avslutas spelet och man får upp vem som vann samt en reset knapp. I min vy diceGame.php har
        jag lite phpkod blandat med htmlkod. När jag först började med att göra uppgiften tänkte jag att detta skulle
        vara lätt men det var det inte. Det tog lite tid att komma igång och sedan fastnade jag helt. Det var först
        efter att Kenneth hjälpte mig som allt började gå bra.
    </p>
    <h4>Några tankar kring SQL så här långt?</h4>
    <p>Det flyter på bra. Jag har gjort de första 10 uppgifterna och de har inte varit så svåra att klara av. Det är
        roligt att uppfriska minnet lite om hur man skriver SQLkod. Jag har använt manualen rätt så mycket då vi har
        använt oss av inbyggda.
    </p>

    <h2>Kmom03</h2>
    <p>Text</p>
    <h2>Kmom04</h2>
    <p>Text</p>
    <h2>Kmom05</h2>
    <p>Text</p>
    <h2>Kmom06</h2>
    <p>Text</p>
    <h2>Kmom07/10</h2>
    <p>Text</p>
</div>