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
     * champData (allytips, altimages, blurb, enemytips, image, info, lore, partype, passive, recommended, skins, spells, stats, tags)
     * @param array $params
     * @param int $id Id of the Champion
     *
     * @return Array
     */
    public function champion($params = [], $id = null)
    {

        // TODO check param validity


        if ($id && isset($params['dataById'])) {
            unset($params['dataById']);
        }

        return $this->call('champion/' . $id, $params, true);
    }

    /**
     * Query Parameters
     * locale
     * version
     * itemListData (all, colloq, consumeOnFull, consumed, depth, from, gold, groups, hideFromAll, image, inStore, into, maps, requiredChampion, sanitizedDescription, specialRecipe, stacks, stats, tags, tree)
     *
     * @param array $params
     * @param null $id
     *
     * @return mixed
     */
    public function item($params = [], $id = null)
    {
        // TODO check param validity

        return $this->call('item/' . $id, $params);
    }

    /**
      * Query Parameters
     * locale
     * version
     * masteryListData (all, image, prereq, ranks, sanitizedDescription, tree)
     * @param array $params
     * @param int $id
     *
     * @return array
     */
    public function mastery($params = [], $id = null)
    {
        // TODO check param validity
        return $this->call('item/' . $id, $params);
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
     * runeListData (all, basic, colloq, consumeOnFull, consumed, depth, from, gold, hideFromAll, image,
     *               inStore, into, maps, requiredChampion, sanitizedDescription, specialRecipe, stacks, stats, tags)
     * @param array $params
     * @param int $id
     *
     * @return array
     */
    public function rune($params = [], $id = null)
    {
        return $this->call('rune/' . $id, $params);
    }

    /**
     * Query Parameters
     * locale
     * version
     * dataById (TRUE or FALSE - Only for all champs)
     * spellData (all, cooldown, cooldownBurn, cost, costBurn, costType, effect, effectBurn, image, key, leveltip,
     *            maxrank, modes, range, rangeBurn, resource, sanitizedDescription, sanitizedTooltip, tooltip, vars)
     * @param array $params
     * @param int $id
     *
     * @return array
     */
    public function summonerSpell($params = [], $id = null)
    {
        return $this->call('summoner-spell/' . $id, $params);
    }

    /**
     * @return array
     */
    public function versions()
    {
        return $this->call('versions', [], true);
    }
} 