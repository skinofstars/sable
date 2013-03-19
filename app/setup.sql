-- Pages

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `title` varchar(56) NOT NULL,
    `slug` varchar(56) NOT NULL,
    PRIMARY KEY(id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `pages` (`id`, `title`, `slug`) VALUES
(1, 'Home', 'home'),
(2, 'About', 'about');

-- Regions

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `name` varchar(56),
    `value` longtext,
    PRIMARY KEY(id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `regions` (`id`, `name`, `value`) VALUES
(1, 'title', 'Welcome'),
(2, 'body', '<p>The home page first paragraph</p></p>The second paragraph</p>'),
(3, 'title', 'About'),
(4, 'body', '<p>The about page first paragraph</p></p>The second paragraph</p>');

-- Relationships

DROP TABLE IF EXISTS `page_region_rel`;
CREATE TABLE IF NOT EXISTS `page_region_rel` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `page_id` INT,
    `region_id` INT,
    PRIMARY KEY(id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `page_region_rel` (`id`, `page_id`, `region_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4);
