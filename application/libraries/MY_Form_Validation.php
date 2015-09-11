<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class MY_Form_validation extends CI_Form_validation {
  private $_custom_field_errors = array();

  function __construct(){
    parent::__construct();
  }
  /**
  *Custom Form Validation Error Messages
  *http://ajmm.org/2011/07/custom-form-validation-error-messages-in-codeigniter-2/
  */
  public function _execute($row, $rules, $postdata = NULL, $cycles = 0)
    {
        // Execute the parent method from CI_Form_validation.
        parent::_execute($row, $rules, $postdata, $cycles);

        // Override any error messages for the current field.
        if (isset($this->_error_array[$row['field']])
            && isset($this->_custom_field_errors[$row['field']]))
        {
            $message = str_replace(
                '%s',
                !empty($row['label']) ? $row['label'] : $row['field'],
                $this->_custom_field_errors[$row['field']]);

            $this->_error_array[$row['field']] = $message;
            $this->_field_data[$row['field']]['error'] = $message;
        }
    }
  /**
  *@desc Allow set a custom validation error message
  *
  */
  public function set_rules($field, $label = '', $rules = '', $message = '')
    {
        $rules = parent::set_rules($field, $label, $rules);

        if (!empty($message))
        {
            $this->_custom_field_errors[$field] = $message;
        }

        return $rules;
    }



   /**
   * @desc Validates a date format
   * @params format,delimiter
   * e.g. DD/MM/YYYY OR MM/DD/YYYY
   */
   function valid_date($params)
   {
    // setup
    $CI =&get_instance();
    $params = explode(',', $params);
    $delimiter = $params[1];
    $date_parts = explode($delimiter, $params[0]);

    // get the index (0, 1 or 2) for each part
    $di = $this->valid_date_part_index($date_parts, 'DD');
    $mi = $this->valid_date_part_index($date_parts, 'MM');
    $yi = $this->valid_date_part_index($date_parts, 'YYYY');

    // regex setup
    $dre =   "(\d{2})";
    $mre = "(\d{2})";
    $yre = "(\d{4})";
    $red = '\\'.$delimiter; // escape delimiter for regex
    $rex = "/^[0]{$red}[1]{$red}[2]/";

    // do replacements at correct positions
    $rex = str_replace("[{$di}]", $dre, $rex);
    $rex = str_replace("[{$mi}]", $mre, $rex);
    $rex = str_replace("[{$yi}]", $yre, $rex);
    
    echo $di.', '.$mi.','.$yi;
    echo '<br/>'.$rex;
    if (preg_match($rex, $str, $matches))
    {
      print_r($matches);
     // skip 0 as it contains full match, check the date is logically valid
     if (checkdate($matches[$mi + 1], $matches[$di + 1], $matches[$yi + 1]))
     {
      return true;
     }
     else
     {
      // match but logically invalid
      $CI->form_validation->set_message('valid_date', "The date is invalid. Valid formaty is {$params[0]}");
      return false;
     }
    }

    // no match
    $CI->form_validation->set_message('valid_date', "The date format is invalid. Use {$params[0]}");
    return false;
   }

   function valid_date_part_index($parts, $search)
   {
    for ($i = 0; $i <= count($parts); $i++)
    {
     if ($parts[$i] == $search)
     {
      return $i;
     }
    }
   }
}
?>