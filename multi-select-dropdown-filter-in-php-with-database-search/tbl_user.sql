--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(8) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `Name`, `Gender`, `Country`) VALUES
(1, 'Jack', 'Female', 'Canada'),
(2, 'Jane', 'Female', 'Mexico'),
(3, 'Emmanuel', 'Male', 'USA'),
(4, 'Franck', 'Male', 'USA'),
(5, 'Kevin Tomas', 'Male', 'Haiti'),
(6, 'Tim Dillon', 'Male', 'Haiti');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
