<?php

return array(

	'secret'  => getenv('NOCAPTCHA_SECRET') ?: '6LcATxgTAAAAAD10HdSlugz74nKvz4NcuCUZ0ijj',
	'sitekey' => getenv('NOCAPTCHA_SITEKEY') ?: '6LcATxgTAAAAANAQpKppQEbY-lcHRKAbtUx0FLnR',

	'lang'    => app()->getLocale(),

);
