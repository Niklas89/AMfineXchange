<?php
class FormattextHelper extends AppHelper
{
   function formattext($text, $taille = 50)
   {
      $text           = strip_tags($text);
      $max_caracteres = $taille;
      $description    = $text;
      if (strlen($description) > $max_caracteres) {
         $description     = substr($description, 0, $max_caracteres);
         $position_espace = strrpos($description, " ");
         $description     = substr($description, 0, $position_espace);
         $description     = $description . "...";
      } //strlen($description) > $max_caracteres
      return $description;
   }
   function fctredimimage($W_max, $H_max, $rep_Dst, $img_Dst, $rep_Src, $img_Src)
   {
      // ------------------------------------------------------------------
      $condition = 0;
      // ------------------------------------------------------------------
      // si le fichier existe dans le répertoire, on continue...
      if (file_exists($img_Src) && ($W_max != 0 || $H_max != 0)) {
         $ExtfichierOK = '" jpg jpeg png"'; // (l espace avant jpg est important)
         // extension fichier Source
         $tabimage     = explode('.', $img_Src);
         $extension    = $tabimage[sizeof($tabimage) - 1]; // dernier element
         $extension    = strtolower($extension); // on met en minuscule
         // ----------------------------------------------------------------
         // extension OK ? on continue ...
         if (strpos($ExtfichierOK, $extension) != '') {
            // -------------------------------------------------------------
            // recuperation des dimensions de l image Src
            $img_size = getimagesize($rep_Src . $img_Src);
            $W_Src    = $img_size[0]; // largeur
            $H_Src    = $img_size[1]; // hauteur
            // -------------------------------------------------------------
            // condition de redimensionnement et dimensions de l image finale
            // -------------------------------------------------------------
            // A- LARGEUR ET HAUTEUR maxi fixes
            if ($W_max != 0 && $H_max != 0) {
               $ratiox    = $W_Src / $W_max; // ratio en largeur
               $ratioy    = $H_Src / $H_max; // ratio en hauteur
               $ratio     = max($ratiox, $ratioy); // le plus grand
               $W         = $W_Src / $ratio;
               $H         = $H_Src / $ratio;
               $condition = ($W_Src > $W) || ($W_Src > $H); // 1 si vrai (true)
            } // -------------------------------------------------------------
            // B- HAUTEUR maxi fixe
            if ($W_max == 0 && $H_max != 0) {
               $H         = $H_max;
               $W         = $H * ($W_Src / $H_Src);
               $condition = $H_Src > $H_max; // 1 si vrai (true)
            } //$W_max == 0 && $H_max != 0
            // -------------------------------------------------------------
            // C- LARGEUR maxi fixe
            if ($W_max != 0 && $H_max == 0) {
               $W         = $W_max;
               $H         = $W * ($H_Src / $W_Src);
               $condition = $W_Src > $W_max; // 1 si vrai (true)
            } //$W_max != 0 && $H_max == 0
            // -------------------------------------------------------------
            // on REDIMENSIONNE si la condition est vraie
            // -------------------------------------------------------------
            // Par defaut : 
            // Si l'image Source est plus petite que les dimensions indiquees :
            // PAS de redimensionnement.
            // Mais on peut "forcer" le redimensionnement en ajoutant ici :
            // $condition = 1;
            if ($condition == 1) {
               // ----------------------------------------------------------
               // creation de la ressource-image "Src" en fonction de l extension
               switch ($extension) {
                  case 'jpg':
                  case 'jpeg':
                     $Ress_Src = imagecreatefromjpeg($rep_Src . $img_Src);
                     break;
                  case 'png':
                     $Ress_Src = imagecreatefrompng($rep_Src . $img_Src);
                     break;
               } //$extension
               // ----------------------------------------------------------
               // creation d une ressource-image "Dst" aux dimensions finales
               // fond noir (par defaut)
               switch ($extension) {
                  case 'jpg':
                  case 'jpeg':
                     $Ress_Dst = imagecreatetruecolor($W, $H);
                     break;
                  case 'png':
                     $Ress_Dst = imagecreatetruecolor($W, $H);
                     // fond transparent (pour les png avec transparence)
                     imagesavealpha($Ress_Dst, true);
                     $trans_color = imagecolorallocatealpha($Ress_Dst, 0, 0, 0, 127);
                     imagefill($Ress_Dst, 0, 0, $trans_color);
                     break;
               } //$extension
               // ----------------------------------------------------------
               // REDIMENSIONNEMENT (copie, redimensionne, re-echantillonne)
               imagecopyresampled($Ress_Dst, $Ress_Src, 0, 0, 0, 0, $W, $H, $W_Src, $H_Src);
               // ----------------------------------------------------------
               // ENREGISTREMENT dans le repertoire (avec la fonction appropriee)
               switch ($extension) {
                  case 'jpg':
                  case 'jpeg':
                     imagejpeg($Ress_Dst);
                     break;
                  case 'png':
                     imagepng($Ress_Dst);
                     break;
               } //$extension
               // ----------------------------------------------------------
            } //$condition == 1
            // -------------------------------------------------------------
         } //strpos($ExtfichierOK, $extension) != ''
      } //file_exists($img_Src) && ($W_max != 0 || $H_max != 0)
      //    ---------------------------------------------------------------
      // si le fichier a bien ete cree
      if ($condition == 1 && file_exists($rep_Dst . $img_Dst)) {
         return true;
      } //$condition == 1 && file_exists($rep_Dst . $img_Dst)
      else {
         return false;
      }
   }
   function date_fran2($time)
   {
      $mois  = array(
         "Janvier",
         "Fevrier",
         "Mars",
         "Avril",
         "Mai",
         "Juin",
         "Juillet",
         "Août",
         "Septembre",
         "Octobre",
         "Novembre",
         "Decembre"
      );
      $jours = array(
         "Dimanche",
         "Lundi",
         "Mardi",
         "Mercredi",
         "Jeudi",
         "Vendredi",
         "Samedi"
      );
      return $jours[date("w", $time)] . " " . date("j", $time) . (date("j", $time) == 1 ? "er " : " ") . $mois[date("n", $time) - 1] . " " . date("Y", $time);
   }
   function date_fran()
   {
      $mois  = array(
         "Janvier",
         "Fevrier",
         "Mars",
         "Avril",
         "Mai",
         "Juin",
         "Juillet",
         "Août",
         "Septembre",
         "Octobre",
         "Novembre",
         "Decembre"
      );
      $jours = array(
         "Dimanche",
         "Lundi",
         "Mardi",
         "Mercredi",
         "Jeudi",
         "Vendredi",
         "Samedi"
      );
      return $jours[date("w")] . " " . date("j") . (date("j") == 1 ? "er" : " ") . $mois[date("n") - 1] . " " . date("Y");
   }
}
?>
