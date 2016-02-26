getInputOptions
-----

#getInputOptions

Snippet to retrieve and output input options of a MODX template variable.

##Usage

A TV may be referenced by name or ID (ID takes precedence)

[[getInputOptions? &name=`myTv`]] //returns the raw input options string
[[getInputOptions? &name=`myTv` &tpl=`chunk`]] //returns parsed chunk


###In another TVs input options

This snippet can be useful for allowing multiple TV's to share input options. For example, we can have a set of inputOptions on `myTV` and set the input options of `myOtherTV` to:

@EVAL return $modx->runSnippet('getInputOptions',array('name' => 'myTV'));


##Available Options

id - ID of TV

name - Name of TV if you'd prefer to not use ID's

tpl - Optional chunk to format output, available placeholders are label and value

toPlaceholder - Optionally set output to a placeholder instead of returning as string.


Author: Jason <jason@dashmedia.com.au>

Official Documentation: https://github.com/dashmedia/getInputOptions/

Bugs and Feature Requests: https://github.com/dashmedia/getInputOptions/issues