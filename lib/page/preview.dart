import 'dart:io';
import 'package:flutter/material.dart';
import 'package:video_player/video_player.dart';

class Preview extends StatefulWidget {
  final String? outputVideoPath;

  const Preview(this.outputVideoPath, {Key? key}) : super(key: key);

  @override
  State<Preview> createState() => _PreviewState();
}

class _PreviewState extends State<Preview> {
  late VideoPlayerController _controller;

  @override
  void initState() {
    super.initState();
    _controller = VideoPlayerController.file(
      File(widget.outputVideoPath!),
    )..initialize().then((_) {
      setState(() {}); // Ekranı yenileme
      _controller.play(); // Video oynatmaya başlıyor
    });
  }

  @override
  void dispose() {
    super.dispose();
    _controller.dispose(); // Kaynakları temizleme
  }

  @override
  Widget build(BuildContext context) => Scaffold(
    backgroundColor: Colors.black,
    appBar: AppBar(
      title: const Text('Preview'),
    ),
    body: Center(
      child: _controller.value.isInitialized
          ? AspectRatio(
        aspectRatio: _controller.value.aspectRatio, // Video boyutunu belirliyoruz
        child: VideoPlayer(_controller), // Video oynatıcı
      )
          : const CircularProgressIndicator(), // Yüklenme aşamasında gösterilecek animasyon
    ),
  );
}