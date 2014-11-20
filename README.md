#Lolapi
##League of Legends Api Wrapper
This library allows you to calls to the RIOT API with a proper API Key.
Simply replace API_KEY_HERE with your API key from Riot Games. If you don't have a key you can get one from [here](developer.riotgames.com).

_This is still a work in progress._

##Installation
Use composer!

##Usage

Initialize the Api

``$api = new Lolapi('API_KEY_HERE');``

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
###Champion
Get the Champion data from the api. This returns current champion info. 

Get all the champions:

``$api->Champion()->all()``

Get a champion by its id:

``$api->Champion()->byId($id)``

###Game
Get recent games for a player by that players id. (Max 10 Games returned by Riot)

``$api->Game()->recent()``

###History
Retrieve match history by summoner ID. You can query multiple summoners.

Simple call: 
You can send a single id to query a single Summoner.

``$api->History()->get($id)``

Parameters are sent as an array, Array key and values are listed below:

- championIds (ids of champions to filter)
- rankedQueues (valid options: RANKED_SOLO_5x5, RANKED_TEAM_3x3, RANKED_TEAM_5x5)
- beginIndex: The begin index to use for fetching games. 
- endIndex: The begin index to use for fetching games.


```
$params = ['championIds' => 1, 'rankedQueues' => 'RANKED_SOLO_5x5'];
$api->History()->get($id, $params);
```

###League
Get various league information.

Get leagues mapped by summoner ID for a given list of summoner IDs.

#####By Summoner or Team
$ids: a single Summoner or Team id or an array of integers for multiple ids:

``$this->League()->bySummoner($ids);``

``$this->League()->byTeam($ids);``

##### By Summoner or Team Entry
Get leagues mapped by team ID for a given list of team IDs or Summoner IDs.

``$this->League()->entryBySummoner($ids);``

``$this->League()->entryByTeam($ids);``


###Match
Get match details for a given match.

``$this->match()->detail($id);``

or you can supply a second parameter (bool) to ask for timeline. Not all matches have timeline info.

``$this->match()->detail($id, true);``

###StaticData
All static data from riot are queried using this method. This method's api calls does not count toward your rate limit.

#####Champion
Get static data about a champion. The following will get all champions with default parameter.

``$api->StaticData()->champion();``

To get a specific champion with default parameters: 

```
// Note that you must supply an empty array for default 
// parameters when requesting a specific champion

$api->StaticData()->champion([], $id);
```

Valid $params, You can pass them as array key/value pairs

- locale
- version
- dataById (TRUE or FALSE - Only for all champs)
- champData ['allytips', 'altimages', 'blurb', 'enemytips', 'image', 'info', 'lore', 'partype', 'passive', 'recommended', 'skins', 'spells', 'stats', 'tags']

```
// Note that if you want more than one champData param
// you can pass it as a comma separated string

$api->StaticData()->champion(['champData' => 'allytips, lore'])
```

#####Item
Get static data about an item. The following will get all items with default parameter.

``$api->StaticData()->item();``

To get a specific item with default parameters: 

```
// Note that you must supply an empty array for default 
// parameters when requesting a specific item

$api->StaticData()->item([], $id);
```

Valid $params, You can pass them as array key/value pairs

- locale
- version
- itemListData ['all', 'colloq', 'consumeOnFull', 'consumed', 'depth', 'from', 'gold', 'groups', 'hideFromAll', 'image', 'inStore', 'into', 'maps', 'requiredChampion', 'sanitizedDescription', 'specialRecipe', 'stacks', 'stats', 'tags', 'tree']

```
// Note that if you want more than one itemlistData param
// you can pass it as a comma separated string

$api->StaticData()->item(['itemListData' => 'image, inStore'])
```

#####Mastery
Get static data about an item. The following will get all masteries with default parameter.

``$api->StaticData()->mastery();``

To get a specific item with default parameters: 

```
// Note that you must supply an empty array for default 
// parameters when requesting a specific mastery

$api->StaticData()->mastery([], $id);
```

Valid $params, You can pass them as array key/value pairs

- locale
- version
- masteryListData ['all', 'image', 'prereq', 'ranks', 'sanitizedDescription', 'tree']

```
// Note that if you want more than one masterylistData param
// you can pass it as a comma separated string

$api->StaticData()->mastery(['maseryListData' => 'image, ranks'])
```

#####Realm
Retrieve realm data.

``$api->StaticData()->realm();``

#####Summoner Spells
Get static data about a summoner spell. The following will get all spells with default parameter.

``$api->StaticData()->summonerSpell();``

To get a specific spell with default parameters: 

```
// Note that you must supply an empty array for default 
// parameters when requesting a specific spell

$api->StaticData()->summonerSpell([], $id);
```

Valid $params, You can pass them as array key/value pairs

- locale
- version
- dataById (TRUE or FALSE - Only for all champs)
- spellData ['all', 'cooldown', 'cooldownBurn', 'cost', 'costBurn', 'costType', 'effect', 'effectBurn', 'image', 'key', 'leveltip', 'maxrank', 'modes', 'range', 'rangeBurn', 'resource', 'sanitizedDescription', 'sanitizedTooltip', 'tooltip', 'vars']


```
// Note that if you want more than one spellData param
// you can pass it as a comma separated string

$api->StaticData()->summonerSpell(['spellData' => 'cooldown, tooltip'])
```

#####Runes
Get static data about a rune. The following will get all runes with default parameter.

``$api->StaticData()->rune();``

To get a specific rune with default parameters: 

```
// Note that you must supply an empty array for default 
// parameters when requesting a specific mastery

$api->StaticData()->rune([], $id);
```

Valid $params, You can pass them as array key/value pairs

- locale
- version
- runeListData ['all', 'basic', 'colloq', 'consumeOnFull', 'consumed', 'depth', 'from', 'gold', 'hideFromAll', 'image', 'inStore', 'into', 'maps', 'requiredChampion', 'sanitizedDescription', 'specialRecipe', 'stacks', 'stats', 'tags']

```
// Note that if you want more than one masterylistData param
// you can pass it as a comma separated string

$api->StaticData()->mastery(['maseryListData' => 'image, ranks'])
```

#####Versions
Retrieve version data.

``$api->StaticData()->versions();``

###Stats
Get Summoner stats. You can omit $season to get the latest season.

Get ranked stats by summoner ID.

``$api->Stats()->ranked($id, $season);``

Get player stats summaries by summoner ID.

``$api->Stats()->summary($id, $seson);``

###Status
Get shard list: 

``$api->Status()->shards();``

Get shard status. Returns the data available on the status.leagueoflegends.com website for the given region. 

``$api->Status()->shards('na')``;

###Summoner
Get info about a summoner.

``$api->Summoner()->get($id);``

Above method call will get info about a summoner. You can pass an array as parameter. This array can contain both names (strings) and ids (integers)

For example:

This query will get both user named remataklan and user with id 343443:

``$api->Summoner()->get(['remataklan', 343443]);``

#####runes
Get runes pages by summoners IDs. A single integer or an array of integers as parameters:

``$api->Summoner()->runes($ids)``

#####masteries
Get runes pages by masteries IDs. A single integer or an array of integers as parameters:

``$api->Summoner()->masteries($ids)``

####name
Get summoner names mapped by summoner ID for a given list of summoner IDs. A single integer or an array of integers as parameters:

``$api->Summoner()->name($ids)``

###Team
Get teams mapped by summoner ID for a given list of summoner IDs. 

``$api->Team()->bySummoner($ids)``

Get teams mapped by team ID for a given list of team IDs.

``$api->Team()->teams($teamIds);``

A single integer or an array of integers as parameters for both methods.
