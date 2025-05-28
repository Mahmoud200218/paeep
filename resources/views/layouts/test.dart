import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: HomeScreen(),
    );
  }
}

class HomeScreen extends StatefulWidget {
  HomeScreen({super.key});

  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  int currentIndex = 0;
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        iconTheme: const IconThemeData(color: Colors.white),
        backgroundColor: Colors.teal,
        title: const Row(
          children: [
            Text(
              'Al-Azhar ',
              style: TextStyle(
                fontWeight: FontWeight.bold,
                color: Colors.white,
              ),
            ),
            Text(
              'University ',
              style:
                  TextStyle(color: Colors.white, fontStyle: FontStyle.italic),
            ),
            Text(
              'in Gaza',
              style: TextStyle(
                letterSpacing: 5,
                fontSize: 16,
                color: Colors.amber,
              ),
            ),
          ],
        ),
      ),
      body: Center(
        child: Padding(
          padding: const EdgeInsets.symmetric(horizontal: 20.0),
          child: Table(
            children: [
              TableRow(
                children: [
                  Container(
                    width: 150,
                    margin: const EdgeInsets.all(4),
                    padding: const EdgeInsets.all(8),
                    color: Colors.amber,
                    child: const Text('Subject'),
                  ),
                  Container(
                    width: 150,
                    margin: const EdgeInsets.all(4),
                    padding: const EdgeInsets.all(8),
                    color: Colors.amber,
                    child: const Text('Subject hours'),
                  ),
                ],
              ),
              TableRow(
                children: [
                  Container(
                    width: 150,
                    margin: const EdgeInsets.all(4),
                    padding: const EdgeInsets.all(8),
                    color: Colors.grey,
                    child: const Text('Subject 1'),
                  ),
                  Container(
                    width: 150,
                    margin: const EdgeInsets.all(4),
                    padding: const EdgeInsets.all(8),
                    color: Colors.grey,
                    child: const Text('2 hours'),
                  ),
                ],
              ),
              TableRow(
                children: [
                  Container(
                    width: 150,
                    margin: const EdgeInsets.all(4),
                    padding: const EdgeInsets.all(8),
                    color: Colors.grey,
                    child: const Text('Subject 2'),
                  ),
                  Container(
                    width: 150,
                    margin: const EdgeInsets.all(4),
                    padding: const EdgeInsets.all(8),
                    color: Colors.grey,
                    child: const Text('3 hours'),
                  ),
                ],
              ),
            ],
          ),
        ),
      ),
      floatingActionButton: Container(
        decoration: BoxDecoration(
            border: Border.all(color: Colors.white, width: 4),
            borderRadius: BorderRadius.circular(50)),
        child: FloatingActionButton(
          shape: RoundedRectangleBorder(
            borderRadius: BorderRadius.circular(50.0),
          ),
          onPressed: () {},
          backgroundColor: Colors.teal,
          child: const Icon(Icons.add),
        ),
      ),
      floatingActionButtonLocation: FloatingActionButtonLocation.centerDocked,
      bottomNavigationBar: BottomAppBar(
        height: 95,
        color: Colors.grey,
        shape: const CircularNotchedRectangle(),
        notchMargin: 8,
        child: Row(
          mainAxisAlignment: MainAxisAlignment.spaceBetween,
          mainAxisSize: MainAxisSize.min,
          children: [
            const SizedBox(width: 32), // Space for FAB
            Column(
              mainAxisSize: MainAxisSize.min,
              children: [
                GestureDetector(
                    onTap: () {
                      setState(() {
                        if (currentIndex != 0) {
                          currentIndex = 0;
                        }
                      });
                    },
                    child: Icon(
                      Icons.home,
                      color: currentIndex == 0 ? Colors.white : Colors.black,
                    )),
                Text('Home',
                    style: TextStyle(
                      color: currentIndex == 0 ? Colors.white : Colors.black,
                    )),
              ],
            ),
            const SizedBox(width: 100), // Space for FAB

            Column(
              mainAxisSize: MainAxisSize.min,
              children: [
                GestureDetector(
                  onTap: () {
                    setState(() {
                      if (currentIndex != 1) {
                        currentIndex = 1;
                      }
                    });
                  },
                  child: Icon(
                    Icons.settings,
                    color: currentIndex == 1 ? Colors.white : Colors.black,
                  ),
                ),
                Text(
                  'Settings',
                  style: TextStyle(
                    color: currentIndex == 1 ? Colors.white : Colors.black,
                  ),
                ),
              ],
            ),
            const SizedBox(width: 32), // Space for FAB
          ],
        ),
      ),
      drawer: Drawer(
        elevation: 25,
        child: Column(
          children: [
            Container(
              width: double.infinity,
              height: 250,
              child: const DrawerHeader(
                decoration: BoxDecoration(
                  color: Colors.teal,
                ),
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    CircleAvatar(
                      radius: 35,
                      child: Text(
                        'I', // First char from student name
                        style: TextStyle(fontSize: 30),
                      ),
                    ),
                    SizedBox(height: 4),
                    Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Text(
                          'ID No: 20202162',
                          style: TextStyle(
                              color: Colors.white, fontWeight: FontWeight.bold),
                        ), // Replace with actual ID
                        Text(
                          'Leena Alqrinawi',
                          style: TextStyle(color: Colors.white),
                        ), // Replace with actual name
                      ],
                    ),
                  ],
                ),
              ),
            ),
            ListTile(
              leading: const Icon(
                Icons.mail,
                color: Colors.grey,
              ),
              contentPadding:
                  const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
              title: const Text('leenaqer@gmail.com'),
              onTap: () {},
            ),
            const Divider(),
            ListTile(
              leading: const Icon(
                Icons.inbox,
                color: Colors.grey,
              ),
              contentPadding:
                  const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
              title: const Text('Inbox'),
              onTap: () {},
            ),
            ListTile(
              leading: const Icon(
                Icons.people,
                color: Colors.grey,
              ),
              contentPadding:
                  const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
              title: const Text('Contact Us'),
              onTap: () {},
            ),
            ListTile(
              leading: const Icon(
                Icons.local_offer,
                color: Colors.grey,
              ),
              contentPadding:
                  const EdgeInsets.symmetric(horizontal: 16, vertical: 8),
              title: const Text('Offers'),
              onTap: () {},
            ),
          ],
        ),
      ),
    );
  }
}