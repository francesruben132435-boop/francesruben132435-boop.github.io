#!/usr/bin/env python3
"""
Simple utility to convert near-white background to transparent.
Usage:
  python tools/make_transparent.py input.jpg output.png --threshold 240

It requires Pillow: pip install pillow
"""
import sys
from PIL import Image


def make_transparent(in_path, out_path, threshold=250):
    im = Image.open(in_path).convert('RGBA')
    datas = im.getdata()
    newData = []
    for item in datas:
        r, g, b, a = item
        if r >= threshold and g >= threshold and b >= threshold:
            newData.append((255, 255, 255, 0))
        else:
            newData.append(item)
    im.putdata(newData)
    im.save(out_path, 'PNG')


def main():
    if len(sys.argv) < 3:
        print('Usage: python tools/make_transparent.py input.jpg output.png [threshold]')
        sys.exit(1)
    inp = sys.argv[1]
    outp = sys.argv[2]
    thresh = int(sys.argv[3]) if len(sys.argv) >= 4 else 250
    make_transparent(inp, outp, thresh)
    print(f'Saved transparent PNG to {outp}')


if __name__ == '__main__':
    main()
