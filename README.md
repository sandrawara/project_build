# project_build

## Innehåll av filerna i project_build

<p> Följande mappar innehåller:</p>
1. Objekt - ett databasobjekt som kopplar upp mot databasen och ett postobjekt som innehåller funktioner för CRUD
som vidare innehåller SQL-kommandon som komminucerar med databasen MySQL. 
2. Update, read, put, deletefilerna formaterar anropsdatan från Fetch API för att skicka rätt argument till postobjektet. 
3. Det finns en read-single innehållande en funktion som hämtar ut specifik tabell.
4. Denna är tänkt att användas tillsammans med project_consumer https://github.com/sandrawara/project_consumer för att kunna hämta ut data.


För körning i exempelvis postman, kör dessa länkar:
<ul>
 <li> Get:http://sandrawara.se/portfolio/project/read_single.php?table=web_pages // Web pages tabellen</li>
 <li>Get: http://sandrawara.se/portfolio/project/read_single.php?table=education // Education tabellen</li>
 <li>Get: http://sandrawara.se/portfolio/project/read_single.php?table=work // Work tabellen</li>
 <li>Post: http://sandrawara.se/portfolio/project/create.php</li>
 <li>Put: http://sandrawara.se/portfolio/project/update.php</li>
 <li>Delete: http://sandrawara.se/portfolio/project/delete.php</li>
</ul>



