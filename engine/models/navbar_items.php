<?php

/*********************************************************************************
 * DonutCMS is free software: you can redistribute it and/or modify              *        
 * it under the terms of the GNU General Public License as published by          *      
 * the Free Software Foundation, either version 3 of the License, or             *
 * (at your option) any later version.                                           *
 *                                                                               *
 * DonutCMS is distributed in the hope that it will be useful,                   *
 * but WITHOUT ANY WARRANTY; without even the implied warranty of                *
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the                  *
 * GNU General Public License for more details.                                  *
 *                                                                               *
 * You should have received a copy of the GNU General Public License             *
 * along with DonutCMS. If not, see <https://www.gnu.org/licenses/>.             *
 * *******************************************************************************/

use DonutCMS\Models\Database;

class NavbarModel

{
    private $database;

    public function __construct()
    {
        $database = new Database();
        $this->database = $database->getConnection('website');
    }

    public function getNavbarItems()
    {
        return $this->database->select('navbar_items', [
            'id',
            'label',
            'url',
            'title',
            'order_index',
            'is_active'
        ], [
            'ORDER' => ['order_index' => 'ASC']
        ]);
    }
}
