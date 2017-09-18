<?php 

protected function circuitFinderRecursive($homeBrew, $SurveyID) {
        
		if (isset($this->hbVarStack[$homeBrew])) {
                // loop condition!!!!
                $lp = array_keys($this->hbVarStack);
                $lp[] = $homeBrew;
                $this->HbLoops[] = $lp;
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