<?php

/****************************************************************
 * Licensed to the Apache Software Foundation (ASF) under one   *
* or more contributor license agreements.  See the NOTICE file *
* distributed with this work for additional information        *
* regarding copyright ownership.  The ASF licenses this file   *
* to you under the Apache License, Version 2.0 (the            *
        * "License"); you may not use this file except in compliance   *
* with the License.  You may obtain a copy of the License at   *
*                                                              *
*   http://www.apache.org/licenses/LICENSE-2.0                 *
*                                                              *
* Unless required by applicable law or agreed to in writing,   *
* software distributed under the License is distributed on an  *
* "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY       *
* KIND, either express or implied.  See the License for the    *
* specific language governing permissions and limitations      *
* under the License.                                           *
****************************************************************/

namespace PHP_SPF;

class YamlTest extends AbstractYamlTest {

    const YAMLFILE2 = "tests.yml";

    protected function __construct(SPFYamlTestDescriptor $def, $test) {
        parent::__construct($def, $test);
    }

    protected function getFilename() {
        return self::YAMLFILE2;
    }

    public static function suite() {
        return new BasicSuite();
    }
}


class BasicSuite extends \PHPUnit_Framework_TestSuite {

    public function __construct() {
        parent::__construct();
        $tests = SPFYamlTestDescriptor::loadTests(self::YAMLFILE2);
        $i = $tests->iterator();
        while ($i->hasNext()) {
            $o = $i.next();
            $ttt = $o->getTests()->keySet()->iterator();
            while ($ttt->hasNext()) {
                $this->addTest(new YamlTest($o, $ttt->next()));
            }
        }
    }

}
