CREATE DATABASE Tweek;

CREATE TABLE Tweek.Users(
	id int NOT NULL AUTO_INCREMENT,
	name varchar (255) NOT NULL,
	email varchar (255) NOT NULL,
	password varchar (255) NOT NULL,
	PRIMARY KEY (id)
);
CREATE TABLE Tweek.Subscriptions(
	id int NOT NULL AUTO_INCREMENT,
	title varchar (50) NOT NULL,
	url text NOT NULL,
	PRIMARY KEY (id)
);
CREATE TABLE Tweek.Subscribed_To(
	id_user int NOT NULL,
	id_subscription int NOT NULL,
	PRIMARY KEY (id_user,id_subscription),
	FOREIGN KEY (id_user) REFERENCES Tweek.Users(id),
	FOREIGN KEY (id_subscription) REFERENCES Tweek.Subscriptions(id)
);

INSERT INTO Subscriptions(title, url) VALUES ("Steelers", "http://www.nfl.com/rss/rsslanding?searchString=team&abbr=PIT");