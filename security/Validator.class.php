<?php
class Validator
{
	#Valida los campos que se encuentran en la key del array, contra el tipo de dato del value.
	public static function validate($to_validate)
    {
        $all_valid = true;

        foreach ($to_validate as $field => $how_to)
        {  
            $data[$field]['data'] = $_POST[$field];         
            $data[$field]['valid'] = call_user_func_array("self::valid_".$how_to, array($_POST[$field]));

            $all_valid = $all_valid & $data[$field]['valid'];
        }

        $data['error'] = !$all_valid;
        return $data;
    }

    #Verifica que sea un string valido: 
	#Que no sea vacio, que tenga un limite de 80 chars,
	#y que acepte espacios y puntos.
    private static function valid_string($input)
    {
        return (preg_match("/^[a-zA-Z0-9-_\.\s]{4,}$/u", $input) == 1);
	}

	private static function valid_number($input)
	{
		return (preg_match("/^[\d][\d ]{0,78}[\d]$/", $input) == 1);
	}

	private static function valid_special_code($input)
	{
		if (preg_match("/^[0-9]{5}$/", $input) or preg_match("/^[A-z]{1}[0-9]{4}$/", $input))
		{
			return true;	
		}
		return (preg_match("/^[A-z]{2}[0-9]{3}$/", $input) == 1);
	}

	private static function valid_email($input)
	{
		if ( strlen($input) <= 80 )
		{
			return (filter_var($input, FILTER_VALIDATE_EMAIL) != FALSE);
		}
		return false;	
	}

    #solo numero.
    static function valid_id($input)    
    {
        if (isset($input))
        {
            return preg_match("/^[0-9]*\.?[0-9]+$/", $input);
        }
        return false;
    }

    #numeros.digito ej: 13.2 anda, 14.23 falla. Acepta signo.
    private static function valid_decimal($input)   
    {
        return preg_match("/^[-+]?[0-9]+\.?[0-9]?$/", $input);
    }

    private static function valid_date($input)
    {
        return preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$input);
    }

    #Acepta string con caracteres especiales (que no acepte ni ' ni " ni ;)
    private static function valid_alpha_num($input) 
    {
        return (preg_match("/^[[:alnum:]\s\-_&@#-]{4,}$/u", $input) == 1);  
    }

    private static function valid_password_repeat($input)
    {
        return $input == $_POST['password'];
    }

	#Puede que no vaya aca.
	public static function pluralize($string) 
    {

        $plural = array(
        array( '/(quiz)$/i',               "$1zes"   ),
        array( '/^(ox)$/i',                "$1en"    ),
        array( '/([m|l])ouse$/i',          "$1ice"   ),
        array( '/(matr|vert|ind)ix|ex$/i', "$1ices"  ),
        array( '/(x|ch|ss|sh)$/i',         "$1es"    ),
        array( '/([^aeiouy]|qu)y$/i',      "$1ies"   ),
        array( '/([^aeiouy]|qu)ies$/i',    "$1y"     ),
        array( '/(hive)$/i',               "$1s"     ),
        array( '/(?:([^f])fe|([lr])f)$/i', "$1$2ves" ),
        array( '/sis$/i',                  "ses"     ),
        array( '/([ti])um$/i',             "$1a"     ),
        array( '/(buffal|tomat)o$/i',      "$1oes"   ),
        array( '/(bu)s$/i',                "$1ses"   ),
        array( '/(alias|status)$/i',       "$1es"    ),
        array( '/(octop|vir)us$/i',        "$1i"     ),
        array( '/(ax|test)is$/i',          "$1es"    ),
        array( '/s$/i',                    "s"       ),
        array( '/$/',                      "s"       )
        );

        $irregular = array(
        array( 'move',   'moves'    ),
        array( 'sex',    'sexes'    ),
        array( 'child',  'children' ),
        array( 'man',    'men'      ),
        array( 'person', 'people'   )
        );

        $uncountable = array( 
        'sheep', 
        'fish',
        'series',
        'species',
        'money',
        'rice',
        'information',
        'equipment'
        );

        // save some time in the case that singular and plural are the same
        if ( in_array( strtolower( $string ), $uncountable ) )
        return $string;

        // check for irregular singular forms
        foreach ( $irregular as $noun )
        {
        if ( strtolower( $string ) == $noun[0] )
            return $noun[1];
        }

        // check for matches using regular expressions
        foreach ( $plural as $pattern )
        {
        if ( preg_match( $pattern[0], $string ) )
            return preg_replace( $pattern[0], $pattern[1], $string );
        }
    
        return $string;
    }
}
?>