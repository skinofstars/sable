DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `page` varchar(56) NOT NULL DEFAULT '',
    `name` varchar(56) NOT NULL DEFAULT '',
    `value` longtext,
    PRIMARY KEY(id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20;

INSERT INTO `regions` (`id`, `page`, `name`, `value`) VALUES
(1, 'home', 'title', 'Page title'),
(2, 'home', 'body', '<p>The first paragraph</p></p>The second paragraph</p>');
