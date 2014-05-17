<?php
//JavaScript control texto sin espacios
        define( "JS_ONLY_TEXT_ESP", " onKeypress=\"hkp(event); if ((_KeyCode < 65 && _KeyCode != 0 && _KeyCode != 8 && _KeyCode != 32) || (_KeyCode > 122 && _KeyCode != alt+165 && _KeyCode != 166 )) return false;\"" );

//JavaScript control texto con espacios
        define( "JS_ONLY_TEXT", " onKeypress=\"hkp(event); if ((_KeyCode < 65 && _KeyCode != 0) && _KeyCode != 32 || _KeyCode > 123) return false;\"" );
       
// JavaScript control solo números
        define( "JS_ONLY_NUMS", " onKeypress=\"hkp(event); if ((_KeyCode < 48 && _KeyCode != 0 && _KeyCode != 8) || _KeyCode > 57) return false;\"" );

