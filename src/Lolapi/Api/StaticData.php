<?php
namespace Lolapi\Api;

class StaticData extends AbstractApi{

    protected $region = 'tr';
    protected $version = '1.2';

    /**
     * Query Parameters:
     * locale
     * version
     * dataById (TRUE or FALSE - Only for all champs)
     * champData
     * @param array $params
     * @param int $id Id of the Champion
     *
     * @return Array
     */
    public function champion($params = [], $id = null)
    {
        $whitelist = ['allytips', 'altimages', 'blurb', 'enemytips', 'image', 'info', 'lore', 'partype', 'passive', 'recommended', 'skins', 'spells', 'stats', 'tags'];

        // check champData for valid tag values
        if (isset($params['champData'])) {
            $params['champData'] = $this->prepareTagString($params['champData'], $whitelist);
        }

        if ($id && isset($params['dataById'])) {
            unset($params['dataById']);
        }

        return $this->call('champion/' . $id, $params, true);
    }

    /**
     * Query Parameters
     * locale
     * version
     * itemListData
     *
     * @param array $params
     * @param null $id
     *
     * @return mixed
     */
    public function item($params = [], $id = null)
    {
        // itemListData whiteList
        $whitelist = ['all', 'colloq', 'consumeOnFull', 'consumed', 'depth', 'from', 'gold', 'groups', 'hideFromAll',
                      'image', 'inStore', 'into', 'maps', 'requiredChampion', 'sanitizedDescription', 'specialRecipe',
                      'stacks', 'stats', 'tags', 'tree'];

        if (isset($params['itemListData'])) {
            $params['itemListData'] = $this->prepareTagString($params['itemListData'], $whitelist);
        }

        return $this->call('item/' . $id, $params, true);
    }

    /**
      * Query Parameters
     * locale
     * version
     * masteryListData
     * @param array $params
     * @param int $id
     *
     * @return array
     */
    public function mastery($params = [], $id = null)
    {
        $whitelist = ['all', 'image', 'prereq', 'ranks', 'sanitizedDescription', 'tree'];

        if (isset($params['masteryListData'])) {
            $params['masteryListData'] = $this->prepareTagString($params['masteryListData'], $whitelist);
        }
        return $this->call('item/' . $id, $params, true);
    }

    /**
     * @return array
     */
    public function realm()
    {
        return $this->call('realm');
    }

    /**
     * Query Parameters
     * locale
     * version
     * runeListData ()
     * @param array $params
     * @param int $id
     *
     * @return array
     */
    public function rune($params = [], $id = null)
    {
        $whitelist = ['all', 'basic', 'colloq', 'consumeOnFull', 'consumed', 'depth', 'from', 'gold', 'hideFromAll', 'image',
                      'inStore', 'into', 'maps', 'requiredChampion', 'sanitizedDescription', 'specialRecipe', 'stacks', 'stats', 'tags'];

        if (isset($params['runeListData'])) {
            $params['runeListData'] = $this->prepareTagString($params['runeListData'], $whitelist);
        }

        return $this->call('rune/' . $id, $params, true);
    }

    /**
     * Query Parameters
     * locale
     * version
     * dataById (TRUE or FALSE - Only for all champs)
     * spellData
     * @param array $params
     * @param int $id
     *
     * @return array
     */
    public function summonerSpell($params = [], $id = null)
    {
        $whitelist = ['all', 'cooldown', 'cooldownBurn', 'cost', 'costBurn', 'costType', 'effect', 'effectBurn',
                      'image', 'key', 'leveltip', 'maxrank', 'modes', 'range', 'rangeBurn', 'resource',
                      'sanitizedDescription', 'sanitizedTooltip', 'tooltip', 'vars'];

        if (isset($params['spellData'])) {
            $params['spellData'] = $this->prepareTagString($params['spellData'], $whitelist);
        }

        return $this->call('summoner-spell/' . $id, $params, true);
    }

    /**
     * @return array
     */
    public function versions()
    {
        return $this->call('versions', [], true);
    }
} 