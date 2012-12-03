<?php

namespace Slug\Test;

use Slug\Slugifier;

class SlugifierTest extends \PHPUnit_Framework_TestCase
{
    public function testCanSlugifyStrings()
    {
        $slugifier = new Slugifier;

        $slug = $slugifier->slugify('This is an example string. Nothing fancy.');
        assertEquals('this-is-an-example-string-nothing-fancy', $slug);

        $slug = $slugifier->slugify('Qu\'en est-il français? Ça marche alors?');
        assertEquals("qu-en-est-il-français-ça-marche-alors", $slug);
    }

    public function testCanSlugifyUsingTransliteration()
    {
        $slugifier = new Slugifier;
        $slugifier->setTransliterate(true);

        $slug = $slugifier->slugify('что делать, если я не хочу, utf-8?');
        assertequals('chto-delat-esli-ya-ne-hochu-utf-8', $slug);

        $slug = $slugifier->slugify('מה אם אני לא רוצה UTF-8 תווים?');
        assertequals('מה-אם-אני-לא-רוצה-utf-8-תווים', $slug);
    }

    public function testCanConfigureSlugResult()
    {
        $slugifier = new Slugifier;
        $slugifier->setLimit(40);
        $slugifier->setDelimiter('_');
        $slugifier->setLowercase(false);
        $slugifier->setReplacements(
            array(
                '/\b(an)\b/i'      => 'a',
                '/\b(example)\b/i' => 'Test'
            )
        );

        $slug = $slugifier->slugify('This is an Example String. What\'s Going to Happen to Me?');
        assertequals('This_is_a_Test_String_What_s_Going_to_Ha', $slug);
    }
}
