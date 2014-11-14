#Lolapi
##League of Legends Api Wrapper
Bu kütüphane sayesinde geçerli bir API anahtarı ile RIOT API'yi sorgulayabilirsiniz.
Sadece API_KEY_HERE yazan yeri Riot Games'den aldığınız kendi API anahtarınız ile değiştirin. Eğer geçerli bir API anahtarınız yoksa [buradan](developer.riotgames.com) bir tane alabilirsiniz.

_Bu hale üzerinde çalışılan bir projedir_

##Kurulum
Composer kullan!

##Usage

Api'yi başlatın:

```$api = new Lolapi('API_KEY_HERE');```

Kullanmak istediğiniz API'yi seçin.
Geçerli seçenekler:

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

Örneğin bir sihirdar (Summoner) sorgusu yapmak için.
aşağıdaki gibi bir şey yapabilirsin.

```
	$api->Summoner()->byName('remataklan'));

// veya
	
	$summoner = new Summoner;
	$remataklan = $summoner->byName('remataklan')

```

Sihirdar (summoner) bilgilerini içeren bir array elde etmelisin.


##API'ler
Pek yakında!