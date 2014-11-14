#Lolapi
##League of Legends Api Wrapper
This library allows you to calls to the RIOT API with a proper API Key.
Simply replace API_KEY_HERE with your API key from Riot Games. If you don't have a key you can get one from [here](developer.riotgames.com).

_This is still a work in progress._

##Installation
Use composer!

##Usage

Initialize the Api

```$api = new Lolapi('API_KEY_HERE');```

Set the Api you want to use.
Valid Choices:

- Champion
- Game
- History
- League
- Match
- StaticData
- Stats
- Status
- Summoner
- Team

For example to get the Summoner details
you can do something like this.

```
	$api->Summoner()->byName('remataklan'));
// or
	$summoner = new Summoner;
	$remataklan = $summoner->byName('remataklan')

```

You should get an array containing the summoner details.


##APIs
Coming soon!