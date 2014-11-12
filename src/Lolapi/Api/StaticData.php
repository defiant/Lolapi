<?php
namespace Lolapi\Api;

class StaticData extends AbstractApi{

    protected $region = 'tr';
    protected $version = '1.2';

    public function champion($id = null)
    {

        /*
         * Query Parameters:
         * locale
         * version
         * dataById (TRUE or FALSE - Only for all champs)
         * champData (allytips, altimages, blurb, enemytips, image, info, lore, partype, passive, recommended, skins, spells, stats, tags)
         */


        return $this->call('champion/' . $id);
    }


    public function item($id = null)
    {
        /*
         * Query Parameters
         * locale
         * version
         * itemListData (all, colloq, consumeOnFull, consumed, depth, from, gold, groups, hideFromAll, image, inStore, into, maps, requiredChampion, sanitizedDescription, specialRecipe, stacks, stats, tags, tree)
         */
        return $this->call('item/' . $id);
    }

    public function mastery($id = null)
    {
        /*
         * Query Parameters
         * locale
         * version
         * masteryListData (all, image, prereq, ranks, sanitizedDescription, tree)
         */

        return $this->call('item/' . $id);
    }

    public function realm()
    {
        return $this->call('realm');
    }

    public function rune($id = null)
    {
        /*
         * Query Parameters
         * locale
         * version
         * runeListData (all, basic, colloq, consumeOnFull, consumed, depth, from, gold, hideFromAll, image,
         *               inStore, into, maps, requiredChampion, sanitizedDescription, specialRecipe, stacks, stats, tags)
         */
        return $this->call('rune/' . $id);
    }

    public function summonerSpell($id = null)
    {
        /*
         * Query Parameters
         * locale
         * version
         * dataById (TRUE or FALSE - Only for all champs)
         * spellData (all, cooldown, cooldownBurn, cost, costBurn, costType, effect, effectBurn, image, key, leveltip,
         *            maxrank, modes, range, rangeBurn, resource, sanitizedDescription, sanitizedTooltip, tooltip, vars)
         */
        return $this->call('summoner-spell/' . $id);
    }

    public function versions()
    {
        return $this->call('versions', [], true);
    }
} 