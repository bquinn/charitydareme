

-- charity
insert into charity (id, description, image_thumbnail, amount_raised) values (1, "WWF", "wwf.jpg", 0.00);
insert into charity (id, description, image_thumbnail, amount_raised) values (2, "Charity2", "charity2.jpg", 2000.00);

-- Luke daring Chester.
insert into dare (dare_id, darer, victim, shortdesc, description, initialcontribution, enddate, charity_id)
values (1, 853925393, 534550735, 'Kiss a random stranger', 'You are in Richmond with a seedy pub next door.  Surely this should not cause too many problems', 2.00, '2010-09-30', 1);

-- pledge prior to paypal preapproval
insert into pledge (dare_id, donor, amount, comment)
values (1, 853925393, 2.00, 'Pledge prior to pre approval');

-- pledge with preapproval
insert into pledge (dare_id, donor, amount, comment, paypal_pre_approval_key, paypal_pre_approval_time, paypal_user_id)
values (1, 853925393, 3.00, 'Pledge with to pre approval', 'key', now(), 'luke.stephenson@gmail.com');

