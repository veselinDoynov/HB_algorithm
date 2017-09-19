<?php

/**
 * Class HomeBrew
 */
class HomeBrew {


    /**
     * hold all found homebrews
     * @var []
     */
    protected $hbVarStack;

    /**
     * hold all found homebrew loops
     * @var []
     */
    protected $hbLoops;

    /**
     *
     *
     *
     * @param string $homeBrew
     * @param int $SurveyID
     */
    protected function circuitFinderRecursive($homeBrew, $SurveyID) {

        if (isset($this->hbVarStack[$homeBrew])) {
            // loop condition!!!!
            $lp = array_keys($this->hbVarStack);
            $lp[] = $homeBrew;
            $this->hbLoops[] = $lp;
            return;
        }

        $this->hbVarStack[$homeBrew] = true;
        $homebrews = $this->getHomeBrew($homeBrew, $SurveyID);

        foreach ($homebrews as $hb) {
            if ($hb) {
                $this->circuitFinderRecursive($hb, $SurveyID);
            }
        }

        //very important line preventing fake loops between different tree branches
        unset($this->hbVarStack[$homeBrew]);
    }


    /**
     * Get homebrews from the DB for this $surveyId pointing to given $homeBrew
     *
     * @param string $homeBrew
     * @param int $surveyId
     * @return array
     */
    protected function getHomeBrew($homeBrew, $surveyId) {

        return [];
    }
}
